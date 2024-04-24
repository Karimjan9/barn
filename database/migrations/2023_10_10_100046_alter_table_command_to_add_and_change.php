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
        Schema::table('command', function (Blueprint $table) {
            $table->bigInteger('file_id')->unsigned()->nullable()->default(0)->change();
            $table->bigInteger('career_file')->nullable()->unsigned()->default(0)->after('file_id');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('command', function (Blueprint $table) {
            $table->dropColumn('career_file');
            $table->bigInteger('file_id')->unsigned()->change();
        });
    }
};
