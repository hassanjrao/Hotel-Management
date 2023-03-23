<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubscriptionPlan::create([
            "name"=>"Daily",
            "slug"=>"daily",
            "price"=>"10",
        ]);

        SubscriptionPlan::create([
            "name"=>"Monthly",
            "slug"=>"monthly",
            "price"=>"100",
        ]);
    }
}
