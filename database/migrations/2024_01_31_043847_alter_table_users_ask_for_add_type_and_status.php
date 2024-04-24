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
        Schema::table('users_ask', function (Blueprint $table) {
            $table->bigInteger('type_id')->after('user_id');
            $table->integer('status')->unsigned()->default(0)->after('number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_ask', function (Blueprint $table) {
            $table->dropColumn('type_id');
            $table->dropColumn('status');
        });
    }
};
