<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('order_to_barn', function (Blueprint $table) {
            $table->integer('give_status')->unsigned()->default(0)->after('givet_item_num');
        });
    }


    public function down()
    {
        Schema::table('order_to_barn', function (Blueprint $table) {
            $table->dropColumn('give_status');
        });
    }
};
