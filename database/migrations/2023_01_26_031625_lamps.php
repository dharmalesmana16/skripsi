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
        Schema::create('lamps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_lampu', 100)->nullable();
            $table->string('brand_lampu', 100)->nullable();
            $table->string('meta', 100)->nullable();
            $table->enum('status', ['ACTIVE', 'NOT ACTIVE']);
            $table->enum('type', ['LED', 'NON LED']);
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
        Schema::drop('lamps');

    }
};