<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\ReleaseStatus;
use App\Models\Room;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons=Coupon::latest()->with(["releaseStatus"])->get();

        return view("cpanel.coupons.index", compact("coupons"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $coupon=null;

        $rooms=Room::latest()->get();

        return view("cpanel.coupons.add_edit", compact("coupon", "rooms"));
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
            "code" => "required|unique:coupons,code",
            "discount" => "nullable|numeric",
            "discount_type" => "nullable|in:fixed,percentage",
            "one_time" => "nullable",
            "room_ids" => "nullable|array",
            "valid_from" => "nullable|date",
            "valid_to" => "nullable|date",
            "release_status" => "required|exists:release_statuses,code",
        ]);

        $coupon = Coupon::create([
            "title" => $request->title,
            "code" => $request->code,
            "discount" => $request->discount,
            "discount_type" => $request->discount_type,
            "one_time" => $request->one_time== "on" ? 1 : 0,
            "valid_from" => $request->valid_from ? date("Y-m-d : H:i:s", strtotime($request->valid_from)) : NULL,
            "valid_to" => $request->valid_to ? date("Y-m-d : H:i:s", strtotime($request->valid_to)) : NULL,
            "release_status" => $request->release_status,
            "created_by" => auth()->id(),
        ]);

        if ($request->room_ids) {
            $coupon->rooms()->attach($request->room_ids);
        }

        return redirect()->route("cpanel.coupons.index")->withToastSuccess("Coupon created successfully");
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
        $coupon=Coupon::findOrFail($id);

        $couponRooms=$coupon->rooms->pluck("id")->toArray();

        $rooms=Room::latest()->get();

        return view("cpanel.coupons.add_edit", compact("coupon", "rooms", "couponRooms"));

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
            "title" => "required",
            "code" => "required|unique:coupons,code,".$id,
            "discount" => "nullable|numeric",
            "discount_type" => "nullable|in:fixed,percentage",
            "one_time" => "nullable",
            "room_ids" => "nullable|array",
            "valid_from" => "nullable|date",
            "valid_to" => "nullable|date",
            "release_status" => "required|exists:release_statuses,code",
        ]);

        $coupon = Coupon::findOrFail($id);

        $coupon->update([
            "title" => $request->title,
            "code" => $request->code,
            "discount" => $request->discount,
            "discount_type" => $request->discount_type,
            "one_time" => $request->one_time== "on" ? 1 : 0,
            "valid_from" => $request->valid_from ? date("Y-m-d : H:i:s", strtotime($request->valid_from)) : NULL,
            "valid_to" => $request->valid_to ? date("Y-m-d : H:i:s", strtotime($request->valid_to)) : NULL,
            "release_status" => $request->release_status,
        ]);

        if ($request->room_ids) {
            $coupon->rooms()->sync($request->room_ids);
        }

        return redirect()->route("cpanel.coupons.index")->withToastSuccess("Coupon updated successfully");

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

    public function releaseStatusUpdate($release_status, $coupon_id)
    {

        $coupon = Coupon::findOrFail($coupon_id);

        $releaseStatus = ReleaseStatus::where("code", $release_status)->first();

        if (!$releaseStatus) {
            return redirect()->route("cpanel.coupons.index")->withToastError("Release status not found");
        }

        $coupon->update([
            "release_status" => $releaseStatus->code
        ]);

        return redirect()->route("cpanel.coupons.index")->withToastSuccess("Release status updated successfully");
    }
}
