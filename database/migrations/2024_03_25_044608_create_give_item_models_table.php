<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('give_item', function (Blueprint $table) {
            $table->id()->startingValue(1000000);
            $table->bigInteger('user_id')->unsigned()->default(1);
            $table->bigInteger('item_id')->unsigned();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('give_item');
    }
};
