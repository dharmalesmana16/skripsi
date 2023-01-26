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
        Schema::create('energys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('kwh');
            $table->float('volt');
            $table->float('current');
            $table->float('daya');
            $table->unsignedBigInteger('lamp_id');
            $table->timestampsTz($precision = 0);
            $table->foreign('lamp_id')->references('id')->on('devices')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('energys');

    }
};