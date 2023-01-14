<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Facility;
use App\Models\Hotel;
use App\Models\HotelImage;
use App\Models\HotelStar;
use App\Models\ReleaseStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::latest()->with("destination", "hotelStar", "releaseStatus", "facilities", "users","createdBy")->get();

        return view("cpanel.hotels.index", compact("hotels"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel = null;

        $facilities = Facility::latest()->get();

        $destinations = Destination::latest()->get();

        $hotelStars = HotelStar::latest()->get();

        $users = User::latest()->get();

        return view("cpanel.hotels.add_edit", compact("hotel", "facilities", "destinations", "hotelStars", "users"));
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
            "description" => "nullable",
            "facilities" => "nullable",
            "destination" => "nullable",
            "hotel_star" => "required|exists:hotel_stars,id",
            "phone" => "nullable|unique:hotels,phone",
            "email" => "nullable|unique:hotels,email",
            "address" => "nullable",
            "lat" => "required",
            "lng" => "required",
            "release_status" => "nullable|exists:release_statuses,code",
            "home_page" => "nullable",
            "image" => "nullable",
            "hotel_users" => "required|array",
        ]);


        $hotel = Hotel::create([
            "title" => $request->title,
            "sub_title" => $request->sub_title,
            "description" => $request->description,
            "destination_id" => $request->destination,
            "hotel_star_id" => $request->hotel_star,
            "phone" => $request->phone,
            "email" => $request->email,
            "address" => $request->address,
            "lat" => $request->lat,
            "lng" => $request->lng,
            "release_status" => $request->release_status,
            "home_page" => $request->home_page == "on" ? 1 : 0,
            "created_by" => auth()->user()->id,

        ]);

        $hotel->facilities()->attach($request->facilities);

        $hotel->users()->attach($request->hotel_users);



        $hotelImages = [];
        if (isset($request->images) && count($request->images) > 0) {

            foreach ($request->images as $image) {
                $folderId = $image;


                $files = Storage::files("uploads/temp/$folderId");

                foreach ($files as $file) {
                    $filename = basename($file);
                    $path = "hotels";
                    Storage::move($file, "$path/$filename");

                    $hotelImages[] = [
                        "hotel_id" => $hotel->id,
                        "image" => $filename,
                        "created_at" => now(),
                        "updated_at" => now(),
                    ];
                }

                Storage::deleteDirectory("uploads/temp/$folderId");
            }
        }
        HotelImage::insert($hotelImages);

        return redirect()->route("cpanel.hotels.index")->withToastSuccess("Hotel created successfully");
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

        $hotel = Hotel::findOrFail($id);

        $facilities = Facility::latest()->get();

        $destinations = Destination::latest()->get();

        $hotelStars = HotelStar::latest()->get();

        $users = User::latest()->get();

        $hotelFacilities = $hotel->facilities->pluck("id")->toArray();
        $hotelUsers = $hotel->users->pluck("id")->toArray();
        $hotelImages = $hotel->images;

        foreach ($hotelImages as $key => $hotelImage) {
            $hotelImage->image = asset("storage/hotels/$hotelImage->image");
        }

        $hotelImages = $hotelImages->toArray();

    // dd($hotelImages);

        return view("cpanel.hotels.add_edit", compact("hotel", "facilities", "destinations", "hotelStars", "users", "hotelFacilities", "hotelUsers", "hotelImages"));
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

        $hotel = Hotel::findOrFail($id);

        $request->validate([
            "title" => "required",
            "sub_title" => "nullable",
            "description" => "nullable",
            "facilities" => "nullable",
            "destination" => "nullable",
            "hotel_star" => "required|exists:hotel_stars,id",
            "phone" => "nullable|unique:hotels,phone,$hotel->id",
            "email" => "nullable|unique:hotels,email,$hotel->id",
            "address" => "nullable",
            "lat" => "required",
            "lng" => "required",
            "release_status" => "nullable|exists:release_statuses,code",
            "home_page" => "nullable",
            "image" => "nullable",
            "hotel_users" => "required|array",
        ]);

        $hotel->update([
            "title" => $request->title,
            "sub_title" => $request->sub_title,
            "description" => $request->description,
            "destination_id" => $request->destination,
            "hotel_star_id" => $request->hotel_star,
            "phone" => $request->phone,
            "email" => $request->email,
            "address" => $request->address,
            "lat" => $request->lat,
            "lng" => $request->lng,
            "release_status" => $request->release_status,
            "home_page" => $request->home_page == "on" ? 1 : 0,
            "created_by" => auth()->user()->id,

        ]);

        $hotel->facilities()->sync($request->facilities);

        $hotel->users()->sync($request->hotel_users);


        return redirect()->route("cpanel.hotels.index")->withToastSuccess("Hotel updated successfully");




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $hotel = Hotel::findOrFail($id);

        $hotel->delete();

        return redirect()->route("cpanel.hotels.index")->withToastSuccess("Hotel deleted successfully");
    }

    public function releaseStatusUpdate($release_status,$hotel_id){

        $hotel=Hotel::findOrFail($hotel_id);

        $releaseStatus=ReleaseStatus::where("code",$release_status)->first();

        if(!$releaseStatus){
            return redirect()->route("cpanel.hotels.index")->withToastError("Release status not found");
        }

        $hotel->update([
            "release_status"=>$releaseStatus->code
        ]);

        return redirect()->route("cpanel.hotels.index")->withToastSuccess("Release status updated successfully");
    }
}
