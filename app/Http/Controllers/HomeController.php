<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $destinations=Destination::homePageDestinations();

        // get top 6 hotels

        $hotels=Hotel::where("home_page",1)
        ->where("release_status","published")
        ->whereHas("rates")
        ->with(["rates"])
        ->take(6)->get();

        $hotel=$hotels->first();


        return view('client.home', compact('destinations','hotels'));
    }
}
