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
        Schema::create('department_kafedra', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100)->nullable();
            $table->bigInteger('res_person')->nullable()->unsigned();
            $table->bigInteger('building_id')->nullable()->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_kafedra');
    }
};
