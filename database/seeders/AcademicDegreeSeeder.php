<?php

namespace Database\Seeders;

use App\Models\AcademicDegreeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */  
      protected $table = "academic_degree";
    public function run()
    {
        AcademicDegreeModel::create(['name'=>"Mavjud emas"]);
        AcademicDegreeModel::create(['name'=>"Phd"]);
        AcademicDegreeModel::create(['name'=>"Dsc"]);
    }
}
