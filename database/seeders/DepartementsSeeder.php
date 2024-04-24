<?php

namespace Database\Seeders;

use App\Models\DepartamentsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = "departaments";
    public function run()
    {
        DepartamentsModel::create(['name'=>"Asosiy",'parent_id'=>'1','parent_level'=>0]);
    }
}
