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
        Schema::table('user_jobs_rate_counter', function (Blueprint $table) {
            $table->integer('status')->unsigned()->nullable()->default(0)->after('out_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_jobs_rate_counter', function (Blueprint $table) {
                $table->dropColumn('status');
        });
    }
};
