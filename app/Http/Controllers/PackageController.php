<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Traits\DaysTrait;

class PackageController extends Controller
{
    use DaysTrait;

    protected $weekDays;

    public function __construct()
    {
        $this->weekDays=$this->weekDays();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $packages=Package::latest()->with("packageDays")->get();

        return view("cpanel.packages.index", compact("packages"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels=Hotel::latest()->get();

        $package=null;

        $days=$this->weekDays;


        return view("cpanel.packages.add_edit", compact("package", "hotels","days"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $weekDaysCodes=array_column($this->weekDays, "code");

        $request->validate([
            "name"=>"required",
            "hotel_ids"=>"required",
            "days"=>"required|array",
            "check_in_day"=>"nullable|in:".implode(",", $weekDaysCodes),
            "check_out_day"=>"nullable|in:".implode(",", $weekDaysCodes),
            "max_nights"=>"nullable|gt:min_nights",
            "min_nights"=>"nullable|lt:max_nights",
        ]);



        $package=Package::create([
            "name"=>$request->name,
            "check_in_day"=>$request->check_in_day,
            "check_out_day"=>$request->check_out_day,
            "min_nights"=>$request->min_nights,
            "max_nights"=>$request->max_nights,
            "created_by"=>auth()->user()->id,
        ]);

        $packageDaysData=[];

        foreach($request->days as $day){
            $packageDaysData[]=[
                "package_id"=>$package->id,
                "day"=>$day,
            ];
        }

        $package->packageDays()->createMany($packageDaysData);

        $package->hotels()->attach($request->hotel_ids);

        return redirect()->route("cpanel.packages.index")->withToastSuccess("success", "Package created successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotels=Hotel::latest()->get();

        $days=$this->weekDays;

        $package=Package::with("packageDays")->findOrFail($id);
        $packageHotels=$package->hotels->pluck("id")->toArray();
        $selectedDays=$package->packageDays->pluck("day")->toArray();

        return view("cpanel.packages.add_edit", compact("package", "hotels","days", "packageHotels", "selectedDays"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package=Package::findOrFail($id);

        $weekDaysCodes=array_column($this->weekDays, "code");

        $request->validate([
            "name"=>"required",
            "hotel_ids"=>"required",
            "days"=>"required|array",
            "check_in_day"=>"nullable|in:".implode(",", $weekDaysCodes),
            "check_out_day"=>"nullable|in:".implode(",", $weekDaysCodes),
            "max_nights"=>"nullable|gt:min_nights",
            "min_nights"=>"nullable|lt:max_nights",
        ]);

        $package->update([
            "name"=>$request->name,
            "check_in_day"=>$request->check_in_day,
            "check_out_day"=>$request->check_out_day,
            "min_nights"=>$request->min_nights,
            "max_nights"=>$request->max_nights,
            "created_by"=>auth()->user()->id,
        ]);

        $packageDaysData=[];
        foreach($request->days as $day){
            $packageDaysData[]=[
                "package_id"=>$package->id,
                "day"=>$day,
            ];
        }

        $package->packageDays()->delete();

        $package->packageDays()->createMany($packageDaysData);

        $package->hotels()->sync($request->hotel_ids);

        return redirect()->route("cpanel.packages.index")->withToastSuccess("success", "Package updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package=Package::findOrFail($id);

        $package->delete();

        return redirect()->route("cpanel.packages.index")->withToastSuccess("success", "Package deleted successfully");
    }
}
