<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Notifications\ClientRegister;
use Illuminate\Support\Facades\Hash;
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


    public function register(){

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

        ]);

        $user->member_ship_number=$user->id;

        $user->save();

        $user->assignRole(["client"]);









        $user->notify(new ClientRegister($user));

        auth()->login($user);

        return redirect()->route('home');


        $this->reset();

    }




    public function render()
    {
        return view('livewire.auth.register');
    }
}
