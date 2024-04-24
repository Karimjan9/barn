<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UserLevel::create(['name' => "rektor", "level" => 1]);
        \App\Models\UserLevel::create(['name' => "bugalter", "level" => 2]);
        \App\Models\UserLevel::create(['name' => "admin_barn", "level" => 3]);
        \App\Models\UserLevel::create(['name' => "storekeeper", "level" => 4]);
        \App\Models\UserLevel::create(['name' => "kadr", "level" => 5]);
        \App\Models\UserLevel::create(['name' => "user", "level" => 6]);
    }
}
