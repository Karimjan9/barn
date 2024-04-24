<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('departaments', function (Blueprint $table) {
            $table->index('parent_id');
            $table->foreign('parent_id')->references('id')->on('departaments')->onDelete('cascade');
        });
    }

   
    public function down()
    {
        Schema::table('departaments', function (Blueprint $table) {
            $table->dropForeign('parent_id');
            $table->dropIndex('parent_id');
        });
    }
};
