<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Package;
use App\Models\Rate;
use App\Models\Tax;
use Illuminate\Http\Request;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rate::latest()->With(["room", "package"])->get();

        return view('cpanel.rates.index', compact('rates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rate = null;
        $hotels = Hotel::latest()->get();

        $packages = Package::latest()->get();

        $rooms = [];

        $taxes = Tax::latest()->get();

        $childrenRates = [];

        return view('cpanel.rates.add_edit', compact('rate', 'hotels', 'rooms', 'packages', 'taxes', 'childrenRates'));
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
            'hotel_id' => 'required|exists:hotels,id',
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'package_id' => 'required|exists:packages,id',
            "price_per_night" => "required|numeric",
            "total_people" => "nullable|numeric",
            "price_extra_adult" => "nullable|numeric",
            "price_extra_child" => "nullable|numeric",
            "fixed_supplement" => "nullable|numeric",
            "discount" => "nullable|numeric",
            "discount_type" => "nullable|in:fixed,percentage",
            'included_tax_id' => 'nullable|exists:taxes,id',
            'added_taxes' => 'nullable|array',
            "min_ages" => "nullable|array",
        ]);

        $rate = Rate::create([
            "hotel_id" => $request->hotel_id,
            "room_id" => $request->room_id,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "package_id" => $request->package_id,
            "price_per_night" => $request->price_per_night,
            "total_people" => $request->total_people,
            "price_extra_adult" => $request->price_extra_adult,
            "price_extra_child" => $request->price_extra_child,
            "fixed_supplement" => $request->fixed_supplement,
            "discount" => $request->discount,
            "discount_type" => $request->discount_type,
            "included_tax_id" => $request->included_tax_id,
            "created_by" => auth()->user()->id,

        ]);

        if ($request->has('added_taxes')) {
            $rate->addedTaxes()->attach($request->added_taxes);
        }

        $dataForChildrenRates = [];

        if ($request->has('min_ages')) {

            foreach ($request->min_ages as $key => $min_age) {

                $dataForChildrenRates[] = [
                    "age_min" => $min_age,
                    "age_max" => $request->max_ages[$key],
                    "price" => $request->child_prices[$key],
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
            }
        }

        if (count($dataForChildrenRates) > 0) {
            $rate->childrenRates()->createMany($dataForChildrenRates);
        }


        return redirect()->route('cpanel.rates.index')->withToastSuccess( 'Rate created successfully');
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
        $rate = Rate::findOrFail($id);

        $childrenRates= $rate->childrenRates()->get();

        $rateHotels = [$rate->hotel_id];

        $hotels = Hotel::latest()->get();

        $packages = Package::latest()->get();

        $rooms = $rate->hotel->rooms;


        $taxes = Tax::latest()->get();

        $addedTaxes = $rate->addedTaxes()->pluck('tax_id')->toArray();

        return view('cpanel.rates.add_edit', compact('rate', 'hotels', 'rooms', 'packages', 'taxes', 'rateHotels', 'addedTaxes', 'childrenRates'));
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
            'hotel_id' => 'required|exists:hotels,id',
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'package_id' => 'required|exists:packages,id',
            "price_per_night" => "required|numeric",
            "total_people" => "nullable|numeric",
            "price_extra_adult" => "nullable|numeric",
            "price_extra_child" => "nullable|numeric",
            "fixed_supplement" => "nullable|numeric",
            "discount" => "nullable|numeric",
            "discount_type" => "nullable|in:fixed,percentage",
            'included_tax_id' => 'nullable|exists:taxes,id',
            'added_taxes' => 'nullable|array',
            "min_ages" => "nullable|array",
        ]);


        $rate = Rate::findOrFail($id);

        $rate->update([
            "hotel_id" => $request->hotel_id,
            "room_id" => $request->room_id,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "package_id" => $request->package_id,
            "price_per_night" => $request->price_per_night,
            "total_people" => $request->total_people,
            "price_extra_adult" => $request->price_extra_adult,
            "price_extra_child" => $request->price_extra_child,
            "fixed_supplement" => $request->fixed_supplement,
            "discount" => $request->discount,
            "discount_type" => $request->discount_type,
            "included_tax_id" => $request->included_tax_id,

        ]);

        if ($request->has('added_taxes')) {
            $rate->addedTaxes()->sync($request->added_taxes);
        } else {
            $rate->addedTaxes()->detach();
        }

        $dataForChildrenRates = [];

        if ($request->has('min_ages')) {

            foreach ($request->min_ages as $key => $min_age) {

                $dataForChildrenRates[] = [
                    "age_min" => $min_age,
                    "age_max" => $request->max_ages[$key],
                    "price" => $request->child_prices[$key],
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
            }
        }

        if (count($dataForChildrenRates) > 0) {
            $rate->childrenRates()->delete();
            $rate->childrenRates()->createMany($dataForChildrenRates);
        }

        return redirect()->route('cpanel.rates.index')->withToastSuccess( 'Rate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $rate = Rate::findOrFail($id);

        $rate->delete();

        return redirect()->route('cpanel.rates.index')->withToastSuccess( 'Rate deleted successfully');

    }
}
