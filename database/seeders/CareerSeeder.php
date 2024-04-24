<?php

namespace Database\Seeders;

use App\Models\CareerModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     protected $table = "career_models";
    public function run()
    {
        CareerModel::create(['career_name' => "Bo'lim boshlig'i"]);
        CareerModel::create(['career_name' => "Admin"]);
        CareerModel::create(['career_name' => "Xodim"]);

    }
}
