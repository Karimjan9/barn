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
        Schema::table('second_type_of_items', function (Blueprint $table) {
            
            $table->bigInteger('type_of_item_id')->unsigned()->nullable()->default(0)->change();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('second_type_of_items', function (Blueprint $table) {

            $table->bigInteger('type_of_item_id')->unsigned()->change();
        
        });
    }
};
