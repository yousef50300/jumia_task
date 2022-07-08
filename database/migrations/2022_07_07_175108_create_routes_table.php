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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->unsignedBigInteger('start_station');
            $table->foreign('start_station')->references('id')->on('cities')->onDelete('cascade');

            $table->unsignedBigInteger('end_station');
            $table->foreign('end_station')->references('id')->on('cities')->onDelete('cascade');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
};
