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
        Schema::table('department_kafedra', function (Blueprint $table) {
            $table->boolean('active_status')->nullable()->default(true)->after('building_id')->comment("Bo'lim aktivligi yoki aktivmasligi");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('department_kafedra', function (Blueprint $table) {
            $table->dropColumn('active_status');
        });
    }
};
