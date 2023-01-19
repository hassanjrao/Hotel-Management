<?php

use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();




Route::middleware(["auth"])->prefix("cpanel")->name("cpanel.")->group(function () {

    Route::get("dashboard", function () {
        return view("cpanel.dashboard");
    })->name("dashboard");

    Route::get("/", function () {
        return view("cpanel.dashboard");
    });

    Route::resource("users", UserController::class);

    Route::resource("facilities", FacilityController::class);

    Route::get("destinations/{release_status}/{destination_id}/release", [DestinationController::class, "releaseStatusUpdate"])->name("destinations.release");
    Route::resource("destinations", DestinationController::class);

    // Route::post("hot")
    Route::get("hotels/{release_status}/{hotel_id}/release", [HotelController::class, "releaseStatusUpdate"])->name("hotels.release");
    Route::get("hotel/facilities", [HotelController::class, "hotelFacilities"])->name('hotels.facilities');
    Route::get("hotel/rooms", [HotelController::class, "hotelRooms"])->name('hotels.rooms');
    Route::resource("hotels", HotelController::class);

    Route::post("upload", [UploadFileController::class, "store"])->name("upload");
    Route::get("get-files/{id}", [UploadFileController::class, "files"])->name("files");


    Route::get("rooms/{release_status}/{room_id}/release", [RoomController::class, "releaseStatusUpdate"])->name("rooms.release");
    Route::resource("rooms", RoomController::class);


    Route::resource('packages', PackageController::class);

    Route::get("taxes/{release_status}/{tax_id}/release", [TaxController::class, "releaseStatusUpdate"])->name("taxes.release");
    Route::resource("taxes", TaxController::class);


    Route::resource("rates", RateController::class);
});
