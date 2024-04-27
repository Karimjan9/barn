<?php

namespace Database\Seeders;

use App\Models\TypeOfItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeOfItem::create(['name_of_type'=>'Хона жиҳозлари	']);
        TypeOfItem::create(['name_of_type'=>'Електрон қурилмалар	']);
        TypeOfItem::create(['name_of_type'=>'АТМ воситалари']);
        TypeOfItem::create(['name_of_type'=>'Дизайн жиҳозлари']);
        TypeOfItem::create(['name_of_type'=>'Хўжалик ва қурилиш воситалари']);
        TypeOfItem::create(['name_of_type'=>'Берилган жиҳозлар	']);
        TypeOfItem::create(['name_of_type'=>'Лаборатория жиҳозлари']);


    }
}
