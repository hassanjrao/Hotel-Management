<?php

namespace App\Http\Controllers;

use App\Models\ReleaseStatus;
use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxes=Tax::latest()->with("releaseStatus")->get();

        return view("cpanel.taxes.index", compact("taxes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tax=null;

        $releaseStatuses=ReleaseStatus::latest()->get();

        return view("cpanel.taxes.add_edit", compact("tax", "releaseStatuses"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            "name" => "required",
            "amount" => "required|numeric",
            "release_status" => "required|exists:release_statuses,code",
        ]);

        $tax=Tax::create([
            "name" => $request->name,
            "amount" => $request->amount,
            "release_status" => $request->release_status,
            "created_by" => auth()->id(),
        ]);

        return redirect()->route("cpanel.taxes.index")->withToastSuccess("Tax created successfully");


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
        $tax=Tax::findOrFail($id);

        $releaseStatuses=ReleaseStatus::latest()->get();

        return view("cpanel.taxes.add_edit", compact("tax", "releaseStatuses"));
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
            "name" => "required",
            "amount" => "required|numeric",
            "release_status" => "required|exists:release_statuses,code",
        ]);

        $tax=Tax::findOrFail($id);

        $tax->update([
            "name" => $request->name,
            "amount" => $request->amount,
            "release_status" => $request->release_status,
        ]);

        return redirect()->route("cpanel.taxes.index")->withToastSuccess("Tax updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tax=Tax::findOrFail($id);

        $tax->delete();

        return redirect()->route("cpanel.taxes.index")->withToastSuccess("Tax deleted successfully");
    }

    public function releaseStatusUpdate($release_status, $tax_id)
    {

        $tax = Tax::findOrFail($tax_id);

        $releaseStatus = ReleaseStatus::where("code", $release_status)->first();

        if (!$releaseStatus) {
            return redirect()->route("cpanel.taxes.index")->withToastError("Release status not found");
        }

        $tax->update([
            "release_status" => $releaseStatus->code
        ]);

        return redirect()->route("cpanel.taxes.index")->withToastSuccess("Release status updated successfully");
    }
}
