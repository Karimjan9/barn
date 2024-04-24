<?php

namespace Database\Seeders;

use App\Models\OrderModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = "order";
    public function run()
    {
        OrderModel::create(['name'=>"Bo'lim"]);
        OrderModel::create(['name'=>"Mansab"]);
    }
}
