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
        Schema::table('career_models', function (Blueprint $table) {
            $table->integer('divide_status')->unsigned()->nullable()->default(0)->after('divide');
            $table->integer('sum_rate')->unsigned()->nullable()->default(0)->after('rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('career_models', function (Blueprint $table) {
            $table->dropColumn('divide_status');
            $table->dropColumn('sum_rate');
        });
    }
};
