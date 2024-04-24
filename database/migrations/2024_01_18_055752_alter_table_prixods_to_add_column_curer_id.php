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
        Schema::table('prixod', function (Blueprint $table) {
            $table->bigInteger('curer_id')->nullable()->after('cost_of_per');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prixod', function (Blueprint $table) {
            $table->dropColumn('curer_id');
        });
    }
};
