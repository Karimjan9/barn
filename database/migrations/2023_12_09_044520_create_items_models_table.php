<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->bigInteger('bodily')->unsigned();
            $table->bigInteger('first');
            $table->bigInteger('second');
            $table->integer('extant')->unsigned()->default(0);
            $table->integer('absent')->unsigned()->default(0);
            $table->integer('status')->unsigned()->default(1);
            $table->mediumText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('items');
   
     
    }
};
