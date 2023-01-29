<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Hotel;
use App\Models\ReleaseStatus;
use Illuminate\Http\Request;

class AcitivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::latest()->with("releaseStatus")->get();

        return view("cpanel.activities.index", compact("activities"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activity = null;

        $releaseStatuses = ReleaseStatus::latest()->get();

        $hotels=Hotel::latest()->get();

        return view("cpanel.activities.add_edit", compact("activity", "releaseStatuses","hotels"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "title" => "required",
            "sub_title" => "nullable",
            "max_children" => "required|numeric",
            "max_adults" => "required|numeric",
            "max_people" => "required|numeric",
            "price_per_person" => "required|numeric",
            "description" => "nullable",
            "duration" => "required|numeric",
            "duration_unit" => "required|in:minutes,hours,days,weeks",
            "lat"=>"required|numeric",
            "lng"=>"required|numeric",
            "release_status" => "required|exists:release_statuses,code",
            "home_page" => "nullable",
            "hotel_ids" => "required|array",
        ]);

        $activity = Activity::create([
            "title" => $request->title,
            "sub_title" => $request->sub_title,
            "max_children" => $request->max_children,
            "max_adults" => $request->max_adults,
            "max_people" => $request->max_people,
            "price_per_person" => $request->price_per_person,
            "description" => $request->description,
            "duration" => $request->duration,
            "duration_unit" => $request->duration_unit,
            "lat" => $request->lat,
            "lng" => $request->lng,
            "release_status" => $request->release_status,
            "home_page" => $request->home_page == "on" ? 1 : 0,
            "created_by" => auth()->user()->id,

        ]);

        if($request->has("hotel_ids")){
            $activity->hotels()->sync($request->hotel_ids);
        }


        return redirect()->route("cpanel.activities.index")->withToastSuccess("Activity created successfully");

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

        $activity = Activity::findOrFail($id);

        $activityHotels = $activity->hotels->pluck("id")->toArray();

        $releaseStatuses = ReleaseStatus::latest()->get();

        $hotels=Hotel::latest()->get();

        return view("cpanel.activities.add_edit", compact("activity", "releaseStatuses","hotels","activityHotels"));
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
        $request->validate([
            "title" => "required",
            "sub_title" => "nullable",
            "max_children" => "required|numeric",
            "max_adults" => "required|numeric",
            "max_people" => "required|numeric",
            "price_per_person" => "required|numeric",
            "description" => "nullable",
            "duration" => "required|numeric",
            "duration_unit" => "required|in:minutes,hours,days,weeks",
            "lat"=>"required|numeric",
            "lng"=>"required|numeric",
            "release_status" => "required|exists:release_statuses,code",
            "home_page" => "nullable",
            "hotel_ids" => "required|array",
        ]);

        $activity = Activity::findOrFail($id);

        $activity->update([
            "title" => $request->title,
            "sub_title" => $request->sub_title,
            "max_children" => $request->max_children,
            "max_adults" => $request->max_adults,
            "max_people" => $request->max_people,
            "price_per_person" => $request->price_per_person,
            "description" => $request->description,
            "duration" => $request->duration,
            "duration_unit" => $request->duration_unit,
            "lat" => $request->lat,
            "lng" => $request->lng,
            "release_status" => $request->release_status,
            "home_page" => $request->home_page == "on" ? 1 : 0,

        ]);

        if($request->has("hotel_ids")){
            $activity->hotels()->sync($request->hotel_ids);
        }

        return redirect()->route("cpanel.activities.index")->withToastSuccess("Activity updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);

        $activity->delete();

        return redirect()->route("cpanel.activities.index")->withToastSuccess("Activity deleted successfully");
    }

    public function releaseStatusUpdate($release_status, $activity_id)
    {

        $activity = Activity::findOrFail($activity_id);

        $releaseStatus = ReleaseStatus::where("code", $release_status)->first();

        if (!$releaseStatus) {
            return redirect()->route("cpanel.activities.index")->withToastError("Release status not found");
        }

        $activity->update([
            "release_status" => $releaseStatus->code
        ]);

        return redirect()->route("cpanel.activities.index")->withToastSuccess("Release status updated successfully");
    }
}
