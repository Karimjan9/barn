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
        Schema::table('prixod', function (Blueprint $table) {
            $table->double('cost_of_per',15,2)->unsigned()->change();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prixod', function (Blueprint $table) {
            $table->integer('cost_of_per')->unsigned()->change();
        });
    }
};
