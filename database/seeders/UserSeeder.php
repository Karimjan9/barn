<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create(['login' => "rektor", "full_name" => "Rektor", "password" => Hash::make('1111'), 'level_id' => 1]);

        \App\Models\User::create(['login' => "bugalter", "full_name" => "Bugalter", "password" => Hash::make('1111'), 'level_id' => 2]);

        \App\Models\User::create(['login' => "admin_barn", "full_name" => "admin_barn", "password" => Hash::make('1111'), 'level_id' => 3]);
        
        \App\Models\User::create(['login' => "storekeeper",  "full_name" => "storekeeper", "password" => Hash::make('1111'), 'level_id' => 4]);

        \App\Models\User::create(['login' => "kadr",  "full_name" => "kadr", "password" => Hash::make('1111'), 'level_id' => 5]);

        \App\Models\User::create(['login' => "user",  "full_name" => "user", "password" => Hash::make('1111'), 'level_id' => 6]);


    }
}
