<?php

namespace Database\Seeders;

use App\Models\ItemUnityModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnityItemsSeeder extends Seeder
{
  
    public function run()
    {
       
        // ItemUnityModel::create(['name'=>'комп']);
        // ItemUnityModel::create(['name'=>"дона"]);
        // ItemUnityModel::create(['name'=>"кв/метр"]);
        // ItemUnityModel::create(['name'=>"м2"]);
        ItemUnityModel::create(['name'=>"метр"]);


    }
}
