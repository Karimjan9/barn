<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SecondTypeOfItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SecondSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SecondTypeOfItem::create(['name'=>'ПАРТАЛАР','type_of_item_id'=>1]);
        SecondTypeOfItem::create(['name'=>'СТУЛ, ДИВАН ва КРЕСЛОЛАР','type_of_item_id'=>1]);
        SecondTypeOfItem::create(['name'=>'СТОЛЛАР','type_of_item_id'=>1]);
        SecondTypeOfItem::create(['name'=>'ШКАФ ва ГАРДЕРОБЛАР','type_of_item_id'=>1]);
        SecondTypeOfItem::create(['name'=>'МЕБЕЛЛАР ва ЖАМЛАМАЛАР','type_of_item_id'=>1]);
        SecondTypeOfItem::create(['name'=>'ДОСКАЛАР','type_of_item_id'=>1]);
        


        SecondTypeOfItem::create(['name'=>'КОНДИЦИОНЕРЛАР','type_of_item_id'=>2]);
        SecondTypeOfItem::create(['name'=>'ТЕЛЕВИЗОР ва СЕНСОР ПАНЕЛЛАР','type_of_item_id'=>2]);
        SecondTypeOfItem::create(['name'=>'ПРОЕКТОРЛАР','type_of_item_id'=>2]);
        SecondTypeOfItem::create(['name'=>'ПРИНТЕР ва ПЕРЕПЛЁТЛАР','type_of_item_id'=>2]);
        SecondTypeOfItem::create(['name'=>'НОУТБУК ва ПЛАНШЕТЛАР','type_of_item_id'=>2]);
        SecondTypeOfItem::create(['name'=>'КОМПЬЮТЕР ва МОНОБЛОКЛАР','type_of_item_id'=>2]);
        SecondTypeOfItem::create(['name'=>'КАБЕЛЬ ва ПИЛОТЛАР','type_of_item_id'=>2]);
        SecondTypeOfItem::create(['name'=>'КАМЕРА ва WI-FIлар','type_of_item_id'=>2]);
        SecondTypeOfItem::create(['name'=>'МИКРОФОН ва НАУШНИКЛАР','type_of_item_id'=>2]);

    



       
        SecondTypeOfItem::create(['name'=>' ДИЗАЙН ЖИҲОЗЛАР','type_of_item_id'=>4]);

        SecondTypeOfItem::create(['name'=>' АТМ воситалари','type_of_item_id'=>3]);
        SecondTypeOfItem::create(['name'=>' ТЕХНИК воситалари','type_of_item_id'=>3]);

        SecondTypeOfItem::create(['name'=>' ҚУРИЛИШ воситалари','type_of_item_id'=>5]);

        SecondTypeOfItem::create(['name'=>' ҚУРИЛИШДА ИШЛАТИЛГАН МАТЕРИАЛЛАР ','type_of_item_id'=>5]);
        SecondTypeOfItem::create(['name'=>' ХЎЖАЛИК воситалари','type_of_item_id'=>5]);

        SecondTypeOfItem::create(['name'=>' Кончиликка оид ЛАБОРАТОРИЯ жиҳозлари ','type_of_item_id'=>7]);
        SecondTypeOfItem::create(['name'=>' тиббиёга оид ЛАБОРАТОРИЯ жиҳозлари','type_of_item_id'=>7]);
    }
}
