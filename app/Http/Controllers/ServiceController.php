<?php

namespace App\Http\Controllers;

use App\Models\ReleaseStatus;
use App\Models\Room;
use App\Models\Service;
use App\Models\Tax;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::latest()->with(["releaseStatus"])->get();

        $priceTypes=Service::priceTypes();

        return view("cpanel.services.index",compact("services","priceTypes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $service=null;

        $priceTypes=Service::priceTypes();

        $releaseStatuses=ReleaseStatus::all();

        $rooms=Room::latest()->get();

        $taxes=Tax::latest()->get();

        return view("cpanel.services.add_edit",compact("service","priceTypes","releaseStatuses","rooms","taxes"));

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


    public function releaseStatusUpdate($release_status, $service_id)
    {

        $service = Service::findOrFail($service_id);

        $releaseStatus = ReleaseStatus::where("code", $release_status)->first();

        if (!$releaseStatus) {
            return redirect()->route("cpanel.service.index")->withToastError("Release status not found");
        }

        $service->update([
            "release_status" => $releaseStatus->code
        ]);

        return redirect()->route("cpanel.service.index")->withToastSuccess("Release status updated successfully");
    }
}
