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
        Schema::table('get_jobs', function (Blueprint $table) {
            $table->bigInteger('type_job')->unsigned()->after('rate_job');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('get_jobs', function (Blueprint $table) {
            $table->dropColumn('type_job');
        });
    }
};
