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
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_device', 100)->nullable();
            $table->string('brand_device', 100)->nullable();
            $table->ipAddress('ipaddress');
            $table->macAddress('macaddress');
            $table->string('meta', 100)->nullable(false);
            $table->string('latitude', 100)->nullable();
            $table->string('longitude', 100)->nullable();
            $table->enum('status', ['ACTIVE', 'NOT ACTIVE']);
            $table->timestampsTz($precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('devices');
    }
};