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
            $table->dropForeign('command_order_id_foreign');
            $table->dropColumn('order_id');
            $table->dropColumn('old_dep');
            $table->dropColumn('new_dep');
            $table->dropColumn('old_career');
            $table->dropColumn('new_career');
            $table->dropColumn('career_file');
           



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
           
        });
    }
};
