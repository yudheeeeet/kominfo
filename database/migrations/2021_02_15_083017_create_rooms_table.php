<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_name');
            $table->string('link');
            $table->string('Meeting_ID');
            $table->string('Passcode');
            $table->string('mulai_peminjaman')->nullable();
            $table->string('akhir_peminjaman')->nullable();
            $table->string('durasi_peminjaman')->nullable();
            $table->date('mulai_penyewaan');
            $table->date('akhir_penyewaan');
            $table->enum('status', ['Tersedia', 'Dipinjam']);
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
        Schema::dropIfExists('rooms');
    }
}
