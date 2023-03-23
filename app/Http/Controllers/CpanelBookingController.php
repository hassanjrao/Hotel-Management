<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Destination;
use App\Models\Hotel;
use App\Models\User;
use App\Notifications\HotelBookingCancelledNotification;
use App\Notifications\HotelBookingConfirmedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CpanelBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if (!$user->hasRole("admin")) {

            $hotelUsers = Hotel::whereHas("users", function ($query) use ($user) {
                $query->where("user_id", $user->id);
            })->get();


            $bookings = Booking::whereHas("bookingDetails", function ($query) use ($hotelUsers) {
                $query->whereIn("hotel_id", $hotelUsers->pluck("id"));
            })
                ->with(["bookingDetails", "destination", "user"])
                ->latest()
                ->get();
        } else {
            $bookings = Booking::with(["bookingDetails", "destination", "user"])
                ->latest()
                ->get();
        }

        return view("cpanel.bookings.index", compact("bookings"));
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
        $booking = Booking::where("id", $id)->with(["bookingDetails", "destination", "user"])->first();

        $users = User::role(["client"])->get();
        $destinations = Destination::publishedDestinations();

        $bookingStatuses = BookingStatus::all();

        return view("cpanel.bookings.add_edit", compact("booking", "users", "destinations", "bookingStatuses"));
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
            "booking_status" => "required|exists:booking_statuses,code",
        ]);


        $booking = Booking::findorfail($id);


        $booking->update([
            "status_code" => $request->booking_status,
        ]);


        if ($booking->status_code == 'confirmed') {
            Notification::send($booking->user, new HotelBookingConfirmedNotification($booking));
        } else if ($booking->status_code == 'cancelled') {
            Notification::send($booking->user, new HotelBookingCancelledNotification($booking));
        }



        return redirect()->back()->with("success", "Booking status updated successfully");
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
