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
        Schema::create('maintenance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('jenis_perbaikan', ['PERBAIKAN LAMPU PJU', 'PENGECEKAN', 'PERBAIKAN ALAT IOT', 'PERBAIKAN KELISTRIKAN']);
            $table->text('action');
            $table->text('komponen');
            $table->float('biaya_keluar');
            $table->unsignedBigInteger('users');
            $table->timestampsTz($precision = 0);
            $table->foreign('users')->references('id')->on('devices')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('maintenance');

    }
};
