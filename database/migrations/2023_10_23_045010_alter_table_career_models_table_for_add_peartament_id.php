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
            $table->bigInteger('departament_id')->nullable()->unsigned()->after('career_name');
            $table->integer('divide')->nullable()->unsigned()->after('departament_id');
            $table->integer('rate')->nullable()->unsigned()->after('divide');
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
            $table->dropColumn('departament_id','divide','rate');
        });
    }
};
