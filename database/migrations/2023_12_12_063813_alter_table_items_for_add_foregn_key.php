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
        Schema::table('items', function (Blueprint $table) {
            $table->foreign('bodily')->references('id')->on('bodily_types');
            $table->foreign('first')->references('id')->on('type_of_items');
            $table->foreign('second')->references('id')->on('second_type_of_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
              $table->dropForeign('bodily_types_id');
            $table->dropForeign('first_type_id');
            $table->dropForeign('second_type_id');
        });
    }
};
