<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities=Facility::latest()->get();

        return view("cpanel.facilities.index",compact("facilities"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "name"=>"required",
            "image"=>"nullable|image"
        ]);

        $imageName=null;

        if($request->hasFile("image")){
            $image=$request->file("image")->store("facilities");

            $imageName=basename($image);
        }

        Facility::create([
            "name"=>$request->name,
            "image"=>$imageName,
            "created_by"=>auth()->user()->id
        ]);

        return redirect()->back()->with("success","Facility created successfully");
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

        $facility=Facility::findOrFail($id);

        return view("cpanel.facilities.edit",compact("facility"));

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
            "name"=>"required",
            "image"=>"nullable|image"
        ]);

        $facility=Facility::findOrFail($id);



        if($request->hasFile("image")){

            if($facility->image){
                Storage::delete("facilities/".$facility->image);
            }

            $image=$request->file("image")->store("facilities");

            $imageName=basename($image);

            $facility->update([
                "image"=>$imageName
            ]);

        }

        $facility->update([
            "name"=>$request->name
        ]);

        return redirect()->route("cpanel.facilities.index")->with("success","Facility updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility=Facility::findOrFail($id);

        if($facility->image){
            Storage::delete("facilities/".$facility->image);
        }

        $facility->delete();

        return redirect()->back()->with("success","Facility deleted successfully");
    }
}
