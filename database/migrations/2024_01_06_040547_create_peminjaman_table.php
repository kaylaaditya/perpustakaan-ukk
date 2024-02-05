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
        Schema::create('peminjaman', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->unsignedBigInteger('buku_id');
                $table->foreign('buku_id')->references('id')->on('buku');
                $table->string('nama_peminjam');
                $table->date('tgl_pinjam');
                $table->date('tgl_pengembalian')->nullable();
                $table->string('rating')->nullable();
                $table->string('ulasan')->nullable();
                $table->string('status_peminjam')->nullable();
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
        Schema::dropIfExists('peminjaman');
    }
};
