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
        Schema::table('order_to_barn', function (Blueprint $table) {
            $table->integer('givet_item_num')->unsigned()->default(0)->after('number_of_item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_to_barn', function (Blueprint $table) {
            $table->dropColumn('givet_item_num');
        });
    }
};
