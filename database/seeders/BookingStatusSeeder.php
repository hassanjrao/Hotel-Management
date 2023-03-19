<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        BookingStatus::create([
            "name" => "Pending",
            "code" => "pending",
        ]);

        BookingStatus::create([
            "name" => "Confirmed",
            "code" => "confirmed",
        ]);

        BookingStatus::create([
            "name" => "Cancelled",
            "code" => "cancelled",
        ]);

        

    }
}
