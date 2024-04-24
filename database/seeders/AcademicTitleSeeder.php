<?php

namespace Database\Seeders;

use App\Models\AcademicTitleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = "academic_title";
    public function run()
    {
        AcademicTitleModel::create(['name'=>"O'qtuvchi"]);
        AcademicTitleModel::create(['name'=>"Katta o'qtuvchi"]);
        AcademicTitleModel::create(['name'=>"Dotsent"]);
        AcademicTitleModel::create(['name'=>"Professor"]);
    }
}
