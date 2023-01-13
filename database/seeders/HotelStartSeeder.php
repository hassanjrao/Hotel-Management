<?php

namespace Database\Seeders;

use App\Models\HotelStar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelStartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotelStarts = [
            [
                "name" => "None",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "1 Star",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "2 Stars",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "3 Stars",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "4 Stars",
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "5 Stars",
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        HotelStar::insert($hotelStarts);
    }
}
