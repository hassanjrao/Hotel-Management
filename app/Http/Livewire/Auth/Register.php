<?php

namespace App\Http\Livewire\Auth;

use App\Models\SubscriptionPlan;
use App\Models\User;
use App\Notifications\ClientRegister;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Register extends Component
{

    public $firstName;
    public $lastName;
    public $email;
    public $address;
    public $postCode;
    public $city;
    public $country;
    public $phone;
    public $mobile;
    public $password;
    public $passwordConfirmation;

    public $subscriptionPlans = [];
    public $selectedSubscriptionPlan;


    public $currentPage = 1;

    public $paymentMethod;

    public $pages = [
        1 => [
            "heading" => "Choose your plan"
        ],
        2 => [
            "heading" => "Enter your details"
        ],
        3 => [
            "heading" => "Enter your card details"
        ]


    ];



    public function nextStep()
    {
        // $this->validate($this->validationRules[$this->currentPage], $this->validationMessages[$this->currentPage]);

        $this->currentPage++;

        if ($this->currentPage == 3) {
            $this->dispatchBrowserEvent("stripe");
        }
    }

    public function prevStep()
    {
        $this->currentPage--;
    }


    public function selectedSubscriptionPlan($plan_id)
    {
        $this->selectedSubscriptionPlan = $plan_id;

        $this->nextStep();
    }


    public $user;
    public $clientSecret;

    public function register()
    {

        $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email',
            'address' => 'required',
            'postCode' => 'required',
            'city' => 'required',
            'country' => 'required',
            'mobile' => 'required|numeric|unique:users,mobile',
            'password' => 'required|min:8',
            'passwordConfirmation' => 'required|same:password',
        ]);

        $user = User::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            "name" => $this->firstName . " " . $this->lastName, // "John Doe
            'email' => $this->email,
            'address' => $this->address,
            'post_code' => $this->postCode,
            'city' => $this->city,
            'country' => $this->country,
            'mobile' => $this->mobile,
            'password' => bcrypt($this->password),
            "plan_id" => $this->selectedSubscriptionPlan,

        ]);

        $user->member_ship_number = $user->id;

        $user->save();

        $user->assignRole(["client"]);


        $this->user = $user;

        $intent = $user->createSetupIntent();

        $this->clientSecret = $intent->client_secret;


        $this->nextStep();
    }

    public function subscription()
    {
        // dd($request->user());

        try {

            $user = $this->user;

            $plan = SubscriptionPlan::find($this->selectedSubscriptionPlan);

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $paymentMethod = $this->paymentMethod;

            if (is_null($user->stripe_id)) {
                $stripeCustomer = $user->createAsStripeCustomer();
            }



            $subscription = $user->newSubscription($plan->id, $plan->stripe_plan)
                ->create($paymentMethod, [
                    'email' => $user->email,
                ]);

            $invoice = $this->generateInvoice($user);


            $user->notify(new ClientRegister($user,$invoice));

            auth()->login($user);

            return redirect()->route("home");
        } catch (\Exception $e) {
            dd($e);
        }
    }


    public function generateInvoice($user){
        // require_once asset('');

        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 48,
            'margin_bottom' => 25,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Invoice");
        $mpdf->SetAuthor(config("app.name"));
        $mpdf->SetWatermarkText("Paid");
        $mpdf->showWatermarkText = true;
        $mpdf->watermark_font = 'DejaVuSansCondensed';
        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');

        // $mpdf->WriteHTML($html);

        $mpdf->WriteHTML(view("client.bookings.invoice", compact("user")));

        $path = "uploads/invoices/";
        $filename = "invoice_" . time() . ".pdf" ;



        // Save PDF on your public storage
        Storage::put($path . $filename, $mpdf->Output($path . $filename, "S"));

        return public_path('storage/'.$path . $filename);
    }

    public function mount()
    {

        $this->subscriptionPlans = SubscriptionPlan::all();

    }




    public function render()
    {
        return view('livewire.auth.register');
    }
}
