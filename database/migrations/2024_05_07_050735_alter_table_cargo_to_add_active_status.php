<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('cargo', function (Blueprint $table) {
           $table->boolean('active_status')->nullable()->default(true)->after('sender_id')->comment('Cargo aktivligi yoki aktivmasligi'); 
        });
    }

  
    public function down()
    {
        Schema::table('cargo', function (Blueprint $table) {
            $table->dropColumn('active_status');
        });
    }
};
