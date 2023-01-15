<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Role::firstOrCreate(["name" => "admin"]);
        Role::firstOrCreate(["name" => "hotel"]);
        Role::firstOrCreate(["name" => "client"]);


        $permission = Permission::firstOrCreate(["name" => "manage users"]);
        $permission->assignRole(["admin"]);


    }
}
