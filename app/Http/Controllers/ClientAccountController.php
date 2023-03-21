<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingStatus;
use Illuminate\Http\Request;

class ClientAccountController extends Controller
{
    public function index(){
        return view("client.account.index");
    }

    public function bookings(){

        $userBookings=Booking::where("user_id",auth()->user()->id)->with(["bookingDetails","bookingStatus","destination"])->latest()->get();

        $bookingStatuses=BookingStatus::all();

        return view("client.account.bookings",compact("userBookings","bookingStatuses"));
    }

    public function bookingDetails($id){

        $booking=Booking::where("id",$id)->with(["bookingDetails","bookingStatus","destination","user"])->first();

        return view("client.account.booking-details",compact("booking"));
    }
}
