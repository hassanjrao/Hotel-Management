<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Hotel;
use App\Models\ReleaseStatus;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::latest()->with("hotel", "roomImages", "facilities", "createdBy","releaseStatus")->get();

        return view("cpanel.rooms.index", compact("rooms"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room = null;

        $facilities = Facility::latest()->get();

        $hotels = Hotel::latest()->get();

        return view("cpanel.rooms.add_edit", compact("room", "facilities", "hotels"));
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
            "sub_title" => "required",
            "hotel_id" => "required|exists:hotels,id",
            "max_children" => "required",
            "max_adults" => "required",
            "max_people" => "required",
            "min_people" => "required",
            "description" => "nullable",
            "facilities" => "nullable",
            "total_rooms" => "required",
            "price_per_night" => "required",
            "release_status" => "required|exists:release_statuses,code",
            "home_page" => "required",
            "images" => "nullable",

        ]);

        $room = Room::create([
            "title" => $request->title,
            "sub_title" => $request->sub_title,
            "hotel_id" => $request->hotel_id,
            "max_children" => $request->max_children,
            "max_adults" => $request->max_adults,
            "max_people" => $request->max_people,
            "min_people" => $request->min_people,
            "description" => $request->description,
            "total_rooms" => $request->total_rooms,
            "price_per_night" => $request->price_per_night,
            "release_status" => $request->release_status,
            "home_page" => $request->home_page =="on" ? true : false,
            "created_by" => auth()->user()->id,
        ]);

        if ($request->has("facilities")) {
            $room->facilities()->attach($request->facilities);
        }
        $roomImages = [];
        if (isset($request->images) && count($request->images) > 0) {

            foreach ($request->images as $image) {
                $folderId = $image;


                $files = Storage::files("uploads/temp/$folderId");

                foreach ($files as $file) {
                    $filename = basename($file);
                    $path = "rooms";
                    Storage::move($file, "$path/$filename");

                    $roomImages[] = [
                        "room_id" => $room->id,
                        "image" => $filename,
                        "created_at" => now(),
                        "updated_at" => now(),
                    ];
                }

                Storage::deleteDirectory("uploads/temp/$folderId");
            }
        }
        RoomImage::insert($roomImages);


        return redirect()->route("cpanel.rooms.index")->with("success", "Room created successfully");
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
        $room = Room::findOrFail($id);

        $facilities = Facility::latest()->get();

        $hotels = Hotel::latest()->get();

        $roomHotels=[$room->hotel_id];

        $roomFacilities=$room->facilities->pluck("id")->toArray();

        return view("cpanel.rooms.add_edit", compact("room", "facilities", "hotels","roomHotels","roomFacilities"));
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
        $room = Room::findOrFail($id);

        $request->validate([
            "title" => "required",
            "sub_title" => "required",
            "hotel_id" => "required|exists:hotels,id",
            "max_children" => "required",
            "max_adults" => "required",
            "max_people" => "required",
            "min_people" => "required",
            "description" => "nullable",
            "facilities" => "nullable",
            "total_rooms" => "required",
            "price_per_night" => "required",
            "release_status" => "required|exists:release_statuses,code",
            "home_page" => "nullable",
            "images" => "nullable",
        ]);

        $room->update([
            "title" => $request->title,
            "sub_title" => $request->sub_title,
            "hotel_id" => $request->hotel_id,
            "max_children" => $request->max_children,
            "max_adults" => $request->max_adults,
            "max_people" => $request->max_people,
            "min_people" => $request->min_people,
            "description" => $request->description,
            "total_rooms" => $request->total_rooms,
            "price_per_night" => $request->price_per_night,
            "release_status" => $request->release_status,
            "home_page" => $request->home_page =="on" ? true : false,
        ]);

        if ($request->has("facilities")) {
            $room->facilities()->sync($request->facilities);
        }

        return redirect()->route("cpanel.rooms.index")->with("success", "Room updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $room = Room::findOrFail($id);

        $room->delete();

        return redirect()->route("cpanel.rooms.index")->with("success", "Room deleted successfully");

    }



    public function releaseStatusUpdate($release_status,$room_id){

        $room=Room::findOrFail($room_id);

        $releaseStatus=ReleaseStatus::where("code",$release_status)->first();

        if(!$releaseStatus){
            return redirect()->route("cpanel.rooms.index")->withToastError("Release status not found");
        }

        $room->update([
            "release_status"=>$releaseStatus->code
        ]);

        return redirect()->route("cpanel.rooms.index")->withToastSuccess("Release status updated successfully");
    }
}
