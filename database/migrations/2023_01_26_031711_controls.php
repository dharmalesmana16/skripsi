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
        Schema::create('controls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_state', 100)->nullable();
            $table->enum('mode', ['MANUAL', 'TIMER']);
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->enum('port', ['PORT1', 'PORT2']);
            $table->enum('state', ['ON', 'OFF']);
            $table->unsignedBigInteger('device_id');
            $table->unsignedBigInteger('lamp_id');
            $table->timestampsTz($precision = 0);
            $table->foreign('device_id')->references('id')->on('devices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lamp_id')->references('id')->on('lamps')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('controls');

    }
};