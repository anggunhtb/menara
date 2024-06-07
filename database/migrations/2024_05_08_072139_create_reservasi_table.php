<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('tanggal_event');
            $table->time('waktu_event');
            $table->string('address');
            $table->string('phone');
            $table->string('event');
            $table->integer('jumlah_anggota');
            $table->string('status')->default('Belum Diapprove'); // 1. approved 2. proses 3. tolak
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
        Schema::dropIfExists('reservasi');
    }
}

