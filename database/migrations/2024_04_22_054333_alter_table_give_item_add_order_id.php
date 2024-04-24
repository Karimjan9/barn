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
            
            $table->bigInteger('order_id')->nullable()->unsigned()->default(0)->after('status');

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

            $table->dropColumn('order_id');

        });
    }
};
