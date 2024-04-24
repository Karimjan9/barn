<?php

namespace Database\Seeders;

use App\Models\TypeJobModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeOfWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeJobModel::create(['name'=>'Asosiy']);
        TypeJobModel::create(['name'=>"Ichki o'rindosh"]);
        TypeJobModel::create(['name'=>"Tashqi o'rindosh"]);


    }
}
