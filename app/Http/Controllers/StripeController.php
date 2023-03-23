<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view("client.stripe.index");
    }


    public function stripePost(Request $request)

    {

        dd($request->all());

        Stripe\Stripe::setApiKey(config("services.stripe.secret"));

        //create customer

        $customer = \Stripe\Customer::create([

            'name' => 'Hassan',

            'address' => [

                'line1' => 'Your Address Line 1',

                'postal_code' => '1234',

                'city' => 'Multan',

                'state' => 'Punjab',

                'country' => 'Pakistan',

            ],

            'email' => 'hassanjrao@gmail.com',

            'source' => $request->stripeToken

        ]);

        $stripe = new \Stripe\StripeClient(

            config("services.stripe.secret")

        );

        $customer_id = $customer->id;

        //create product

        $product = $stripe->products->create([

            'name' => 'Diamond',

            'id'   => '123',

            'metadata' => [

                'name' => "silver",

                'last-date' => '30-7-2021'

            ]

        ]);

        $product_id = $product->id;

        //define product price and recurring interval

        $price = $stripe->prices->create([

            'unit_amount' => 2000,

            'currency' => 'usd',

            'recurring' => ['interval' => 'month'],

            'product' => $product_id,

        ]);

        $price_id = $price->id;

        //CREATE SUBSCRIPTION

        $subscription = $stripe->subscriptions->create([

            'customer' => $customer_id,

            'items' => [

                ['price' => $price_id],

            ],

            'metadata' => [

                'start_date' => '30-7-2021',

                'total_months' => '11',

                'end_date' => '30-5-2022'

            ]

        ]);

        dd("success");

        return back();
    }
}
