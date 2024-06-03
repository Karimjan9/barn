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
        Schema::table('give_item', function (Blueprint $table) {
            $table->renameColumn('order_id', 'dep_id');
            $table->integer('status')->default(0)->comment("0-bo'sh jihoz ,1-band,2-qabul qilingan")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('give_item', function (Blueprint $table) {
            $table->renameColumn('dep_id', 'order_id');
            $table->integer('status')->default(0)->change();

        });
    }
};
