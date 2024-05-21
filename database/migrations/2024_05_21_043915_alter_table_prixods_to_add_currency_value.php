<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('prixod', function (Blueprint $table) {
            $table->double('currency_value', 15, 2)->nullable()->default(1)->after('currency_id');
        });
    }

 
    public function down()
    {
        Schema::table('prixod', function (Blueprint $table) {
            $table->dropColumn('currency_value');
        });
    }
};
