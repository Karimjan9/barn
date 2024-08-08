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
            $table->integer('repair_allow_status')->unsigned()->default(0)->after('repair_status')->comment('0-hali k6rilmagan, 1-ruxsat berilgan ,2-ruxsat berilmagan');
            $table->bigInteger('repair_allow_user')->default(0)->after('repair_allow_status');
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
            $table->dropColumn('repair_allow_status');
            $table->dropColumn('repair_allow_user');
        });
    }
};
