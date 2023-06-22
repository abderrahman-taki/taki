<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('pack_id')->nullable();
            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('cascade');
            $table->unsignedBigInteger('breakfast_id')->nullable();
            $table->foreign('breakfast_id')->references('id')->on('breakfasts')->onDelete('cascade');
            $table->unsignedBigInteger('lunch_id')->nullable();
            $table->foreign('lunch_id')->references('id')->on('lunches')->onDelete('cascade');
            $table->unsignedBigInteger('dinner_id')->nullable();
            $table->foreign('dinner_id')->references('id')->on('dinners')->onDelete('cascade');
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
        Schema::dropIfExists('days');
    }
}
