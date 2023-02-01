<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Destination;
use App\Models\Facility;
use App\Models\Hotel;
use App\Models\Package;
use App\Models\Rate;
use App\Models\Room;
use App\Models\Tax;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities=Facility::all()->count();
        $destinations=Destination::all()->count();
        $users=0;
        $taxes=0;

        if(auth()->user()->hasRole("admin")){
            $hotels = Hotel::all()->count();
            $rooms = Room::all()->count();
            $users= User::all()->count();
            $packages=Package::all()->count();
            $taxes=Tax::all()->count();
            $rates=Rate::all()->count();
            $coupons=Coupon::all()->count();
        }
        else  if(auth()->user()->hasRole("hotel")){

            $userHotels=auth()->user()->hotels->pluck("id")->toArray();

            $hotels = Hotel::whereIn("id",$userHotels)->count();

            $userRooms = Room::latest()->whereHas("hotel", function ($q) use ($userHotels) {
                $q->whereIN("hotel_id", $userHotels);
            })->get();

            $rooms=$userRooms->count();


            $packages = Package::latest()->with("packageDays")->whereHas("hotels", function ($q) use ($userHotels){
                $q->whereIN("hotel_id", $userHotels);
            })->count();

            $rates = Rate::latest()->with(["room", "package"])->whereIn("hotel_id", $userHotels)->count();


            $coupons = Coupon::latest()->with(["releaseStatus"])->whereHas("rooms", function ($q) use ($userRooms) {
                $q->whereIN("room_id", $userRooms->pluck("id")->toArray());
            })->count();


        }


        return view("cpanel.dashboard",compact("hotels","rooms","packages","rates","coupons","users","taxes","facilities","destinations"));
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
