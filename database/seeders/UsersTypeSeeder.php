<?php

namespace Database\Seeders;

use App\Models\UsersTypeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsersTypeModel::create(['name'=>'Aktiv holat']);
        UsersTypeModel::create(['name'=>"Passiv holat"]);
        UsersTypeModel::create(['name'=>"Neytral holat"]);
    }
}
