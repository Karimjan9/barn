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
        Schema::table('give_item', function (Blueprint $table) {
            $table->integer('repair_count')->unsigned()->after('dep_id')->default(0);
            $table->boolean('repair_status')->default(false)->after('repair_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('give_item', function (Blueprint $table) {
            $table->dropColumn('repair_count');
            $table->dropColumn('repair_status');

        });
    }
};
