<?php

namespace Database\Seeders;

use App\Models\BodilyTypeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = "bodily_types";
    public function run()
    {
        BodilyTypeModel::create(['name' => "Moddiy",'bodily'=>1]);
        BodilyTypeModel::create(['name' => "Nomodiy",'bodily'=>0]);
    }
}
