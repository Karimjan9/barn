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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname', 100)->nullable();
            $table->string('other_name',100)->nullable();
            $table->timestamp('birth_date')->nullable();
            $table->string('nation', 100)->nullable();
            $table->string('gender')->nullable();
            $table->string('birth_place', 100)->nullable();
            $table->bigInteger('number_phone')->nullable()->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('other_name');
            $table->dropColumn('birth_date');
            $table->dropColumn('nation');
            $table->dropColumn('gender');
            $table->dropColumn('birth_place');
            $table->dropColumn('number_phone');
            
        });
    }
};
