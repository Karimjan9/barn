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

        $table->foreign('currency_id')->references('id')->on('currency');
       
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
            
            $table->dropForeign('prixod_currency_id_foreign');
            
        });
    }
};
