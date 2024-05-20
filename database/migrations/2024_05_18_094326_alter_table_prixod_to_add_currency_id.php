<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up()
    {
        Schema::table('prixod', function (Blueprint $table) {
            $table->bigInteger('currency_id')->nullable()->unsigned()->default(1)->after('curer_id');
        });
    }


    public function down()
    {
        Schema::table('prixod', function (Blueprint $table) {
            $table->dropColumn('currency_id');
        });
    }
};
