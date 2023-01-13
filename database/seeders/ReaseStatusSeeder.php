<?php

namespace Database\Seeders;

use App\Models\ReleaseStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReaseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Published',
                'code' => 'published',
            ],
            [
                "name"=>"Not Published",
                "code"=>"not_published",
            ],
            [
                "name"=>"Awaiting",
                "code"=>"awaiting",
            ],
            [
                'name' => 'Archived',
                'code' => 'archived',
            ],
        ];

        foreach ($statuses as $status) {
            ReleaseStatus::firstOrCreate($status, $status);
        }

    }
}
