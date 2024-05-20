<?php

namespace Database\Seeders;

use App\Models\CurrencyModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = "currency";
    public function run()
    {
        CurrencyModel::create(['name' => "Uzb",'value'=>1]);
        CurrencyModel::create(['name' => "Rubl",'value'=>150]);
        CurrencyModel::create(['name' => "USD",'value'=>12500]);

    }
}
