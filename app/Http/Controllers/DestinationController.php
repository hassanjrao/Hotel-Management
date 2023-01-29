<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\ReleaseStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations=Destination::latest()->get();

        return view("cpanel.destinations.index",compact("destinations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destination=null;

        return view("cpanel.destinations.add_edit",compact("destination"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([
            "name"=>"required",
            "title"=>"required",
            "sub_title"=>"nullable",
            "title_tag"=>"required",
            "main_text"=>"nullable",
            "video_url"=>"nullable|url",
            "lat"=>"required",
            "lng"=>"required",
            "description"=>"nullable",
            "release_status"=>"nullable|exists:release_statuses,code",
            "home_page"=>"nullable",
            "image"=>"nullable",
        ]);


        $request->home_page=$request->home_page =="on" ? 1 : 0;

        $imageName=NULL;


        if($request->hasFile("image")){
            $request->validate([
                "image"=>"image|mimes:jpg,jpeg,png|max:2048"
            ]);

            $image=$request->file("image")->store("destinations");

            $imageName=basename($image);
        }


        Destination::create([
            "name"=>$request->name,
            "title"=>$request->title,
            "sub_title"=>$request->sub_title,
            "title_tag"=>$request->title_tag,
            "main_text"=>$request->main_text,
            "video_url"=>$request->video_url,
            "lat"=>$request->lat,
            "lng"=>$request->lng,
            "description"=>$request->description,
            "release_status"=>$request->release_status,
            "home_page"=>$request->home_page,
            "image"=>$imageName,
            "created_by"=>auth()->user()->id
        ]);

        return redirect()->route("cpanel.destinations.index")->withToastSuccess("Destination created successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        return view("cpanel.destinations.add_edit",compact("destination"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {

        $request->validate([
            "name"=>"required",
            "title"=>"required",
            "sub_title"=>"nullable",
            "title_tag"=>"required",
            "main_text"=>"nullable",
            "video_url"=>"nullable|url",
            "lat"=>"required",
            "lng"=>"required",
            "description"=>"nullable",
            "release_status"=>"nullable|exists:release_statuses,code",
            "home_page"=>"nullable",
            "image"=>"nullable",
        ]);

        $imageName=$destination->image;

        $request->home_page=$request->home_page =="on" ? 1 : 0;

        if($request->hasFile("image")){

            if($destination->image){
                Storage::delete("destinations/".$destination->image);
            }

            $request->validate([
                "image"=>"image|mimes:jpg,jpeg,png|max:2048"
            ]);

            $image=$request->file("image")->store("destinations");

            $imageName=basename($image);
        }

        $destination->update([
            "name"=>$request->name,
            "title"=>$request->title,
            "sub_title"=>$request->sub_title,
            "title_tag"=>$request->title_tag,
            "main_text"=>$request->main_text,
            "video_url"=>$request->video_url,
            "lat"=>$request->lat,
            "lng"=>$request->lng,
            "description"=>$request->description,
            "release_status"=>$request->release_status,
            "home_page"=>$request->home_page ?? 0,
            "image"=>$imageName,
        ]);

        return redirect()->route("cpanel.destinations.index")->withToastSuccess("Destination updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        if($destination->image){
            Storage::delete("destinations/".$destination->image);
        }

        $destination->delete();

        return redirect()->route("cpanel.destinations.index")->withToastSuccess("Destination deleted successfully");
    }


    public function releaseStatusUpdate($release_status,$destination_id){

        $destination=Destination::findOrFail($destination_id);

        $releaseStatus=ReleaseStatus::where("code",$release_status)->first();

        if(!$releaseStatus){
            return redirect()->route("cpanel.destinations.index")->withToastError("Release status not found");
        }

        $destination->update([
            "release_status"=>$releaseStatus->code
        ]);

        return redirect()->route("cpanel.destinations.index")->withToastSuccess("Destination release status updated successfully");
    }
}
