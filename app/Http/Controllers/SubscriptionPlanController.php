<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $plans = SubscriptionPlan::get();

        return view("client.plans.index", compact("plans"));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function show(SubscriptionPlan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();

        return view("client.plans.subscription", compact("plan", "intent"));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscription(Request $request)
    {
        // dd($request->user());
        $plan = SubscriptionPlan::find($request->plan);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $user= $request->user();
        $paymentMethod = $request->payment_method;
        $stripeToken = $request->stripe_token;

        if (is_null($user->stripe_id)) {
            $stripeCustomer = $user->createAsStripeCustomer();
        }

        


        $subscription = $user->newSubscription($request->plan, $plan->stripe_plan)
                        ->create($paymentMethod, [
                            'email' => $user->email,
                        ]);

        return view("subscription_success");
    }
}
