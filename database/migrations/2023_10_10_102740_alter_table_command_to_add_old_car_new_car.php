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
            $table->bigInteger('old_dep')->unsigned()->nullable()->default(0)->change();
            $table->bigInteger('new_dep')->unsigned()->nullable()->default(0)->change();
            $table->bigInteger('old_career')->unsigned()->nullable()->default(0)->after('new_dep');
            $table->bigInteger('new_career')->unsigned()->nullable()->default(0)->after('old_career');
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
            $table->bigInteger('old_dep')->unsigned()->change();
            $table->bigInteger('new_dep')->unsigned()->change();
            $table->dropColumn('old_career');
            $table->dropColumn('new_career');

        });
    }
};
