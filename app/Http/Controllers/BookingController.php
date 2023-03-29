<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Destination;
use App\Models\Hotel;
use App\Models\Room;
use App\Notifications\HotelBookingNotification;
use App\Notifications\NewReservationHotelNotification;
use App\Notifications\NewReservationUserNotification;
use App\Notifications\UserBookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{

    public function indexBlade(Request $request)
    {



        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $selectedDestination = 1;
        $enteredPersons=1;




        $hotels = Hotel::where("home_page", 1)
            ->where("release_status", "published")
            ->whereHas("rates")
            ->with(["rates", "rooms", "facilities", "images", "rooms.facilities"])
            ->get();



        // dd($hotels);

        $destinations = Destination::publishedDestinations();


        return view("client.bookings.index", compact("hotels", "destinations","fromDate","toDate","selectedDestination","enteredPersons"));
    }

    public function index(Request $request)
    {


        $fromDate = $request->from_date;
        $toDate = $request->to_date;
        $selectedDestination = $request->destination;
        $enteredPersons=$request->total_persons;




        $hotels = Hotel::where("home_page", 1)
            ->where("release_status", "published")
            ->whereHas("rates")
            ->where("destination_id", $selectedDestination)
            ->with(["rates", "rooms", "facilities", "images", "rooms.facilities","rooms.rate"])
            ->get();

        $hotels=$hotels->map(function($hotel){

            $hotelImage = '';

            if ($hotel->images->count() > 0) {
                $hotelImage = $hotel->images->last()->image;
            }

            return [
                "title" => $hotel->title,
                "sub_title" => $hotel->sub_title,
                "id" => $hotel->id,
                "min_price" => $hotel->rates->min("price_per_night"),
                "image"=> asset('storage/hotels/' . $hotelImage),
                "facilities" => $hotel->facilities->map(function($facility){
                    return [
                        "id" => $facility->id,
                        "name" => $facility->name,
                        "image" => asset('storage/facilities/' . $facility->image)
                    ];
                }),
                "rooms"=> $hotel->rooms->map(function($room){

                    $roomImage = '';
                    if($room->roomImages->count()>0){
                        $roomImage = $room->roomImages->last()->image;
                    }

                    return [
                        "id" => $room->id,
                        "title" => $room->title,
                        "sub_title" => $room->sub_title,
                        "price_per_night" => $room->price_per_night,
                        "max_people" => $room->max_people,
                        "total_rooms" => $room->total_rooms,
                        "hotel_id" => $room->hotel_id,
                        "image" => asset('storage/rooms/' . $roomImage),
                        "facilities" => $room->facilities->map(function($facility){
                            return [
                                "id" => $facility->id,
                                "name" => $facility->name,
                                "image" => asset('storage/facilities/' . $facility->image)
                            ];
                        }),
                        "room_rows"=>[],
                        "rate"=>$room->rate
                    ];
                })
            ];
        });

        // dd($hotels);

        $destinations = Destination::publishedDestinations();


        return view("client.bookings.index", compact("hotels", "destinations","fromDate","toDate","selectedDestination","enteredPersons"));
    }


    public function store(Request $request)
    {

        $request->validate([
            "hotel_id" => "required|exists:hotels,id",
            "from_date" => "required|date",
            "to_date" => "required|date",
            "destination_id" => "required|exists:destinations,id",
            "hotel_bookings" => "required|array",
        ]);


        $hotelBookings = $request->hotel_bookings;

        // remove null index from the array
        $hotelBookings = array_filter($hotelBookings, function ($hotelBooking) {
            return $hotelBooking != null;
        });


        $bookingDetailsData=[];

        foreach ($hotelBookings as $room_id=> $roomBookings) {

            $totalPersons = 0;
            $totalAmount = 0;
            $pricePerNight = 0;

            foreach ($roomBookings as $roomBooking) {
                $totalPersons += $roomBooking["persons"];
                $totalAmount += $roomBooking["price_per_night"];
                $pricePerNight = $roomBooking["price_per_night"];

            }


            $bookingDetailsData[]=[
                "room_id" => $room_id,
                "hotel_id" => $request->hotel_id,
                "total_persons" => $totalPersons,
                "total_amount" => $totalAmount,
                "total_rooms" => count($roomBookings),
                "price_per_night" => $pricePerNight,
            ];


        }

        $bookingTotalRooms=0;
        $bookingTotalPersons=0;
        $bookingTotalAmount=0;


        foreach ($bookingDetailsData as $bookingDetail) {

            $bookingTotalRooms+=$bookingDetail["total_rooms"];
            $bookingTotalPersons+=$bookingDetail["total_persons"];
            $bookingTotalAmount+=$bookingDetail["total_amount"];

        }



        $booking=Booking::create([
            "user_id" => auth()->user()->id,
            "from_date" => $request->from_date,
            "to_date" => $request->to_date,
            "destination_id" => $request->destination_id,
            "total_persons" => $bookingTotalPersons,
            "total_rooms" => $bookingTotalRooms,
            "total_amount" => $bookingTotalAmount,
            "status_code" => "pending",
        ]);

        $booking->bookingDetails()->createMany($bookingDetailsData);



        // hotel user

        $hotelUsers=Hotel::where("id", $request->hotel_id)->first()->users;
        $authUser=auth()->user();


        Notification::send($hotelUsers, new NewReservationHotelNotification($booking));


        $authUser->notify(new NewReservationUserNotification($booking));


        return response()->json([
                "message" => "Booking created successfully",
                "status" => "success",

        ]);

        // send notifiction to the hotel and the user

    }

    public function getRoom(Request $request)
    {
        $request->validate([
            "room_id" => "required|exists:rooms,id"
        ]);


        $room = Room::where("id", $request->room_id)
            ->with(["rate","rate.package"])
            ->first();



        return response()->json([
            "data" => [
                "room" => $room
            ]
        ]);
    }


}
