<?php

namespace Database\Seeders;

use App\Models\RateModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateOfWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RateModel::create(['rate'=>'0.25']);
        RateModel::create(['rate'=>'0.5']);
        RateModel::create(['rate'=>'0.75']);
        RateModel::create(['rate'=>'1']);
    }
}
