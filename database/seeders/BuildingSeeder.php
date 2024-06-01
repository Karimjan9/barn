<?php

namespace Database\Seeders;

use App\Models\BuildingModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = "building";
    public function run()
    {
        BuildingModel::create(['name' => " 1-Bino "]);
        BuildingModel::create(['name' => "2-Bino"]);
        BuildingModel::create(['name' => "3-Bino"]);

    }
}
