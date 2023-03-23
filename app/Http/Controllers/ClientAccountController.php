<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Notifications\UserBookingCancelledNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ClientAccountController extends Controller
{
    public function index(){
        return view("client.account.index");
    }

    public function bookings(){

        $userBookings=Booking::where("user_id",auth()->user()->id)->with(["bookingDetails","bookingStatus","destination"])
        ->orderBy("updated_at","desc")
        ->get();

        $bookingStatuses=BookingStatus::all();

        return view("client.account.bookings",compact("userBookings","bookingStatuses"));
    }

    public function bookingDetails($id){

        $booking=Booking::where("id",$id)->with(["bookingDetails","bookingStatus","destination","user"])->first();

        return view("client.account.booking-details",compact("booking"));
    }

    public function cancelBooking(Request $request){

        $request->validate([
            "booking_id"=>"required|exists:bookings,id"
        ]);


        $booking=Booking::where("id",$request->booking_id)->where("user_id",auth()->user()->id)->with(["bookingDetails","bookingStatus","destination","user"])->first();

        if(!$booking){
            return redirect()->back()->with("error","Booking Not Found");
        }

        $booking->status_code='cancelled';
        $booking->save();

        Notification::send($booking->user,new UserBookingCancelledNotification($booking));

        return redirect()->back()->with("success","Booking Cancelled Successfully");
    }
}
