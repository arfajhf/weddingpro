<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_waddings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_pria');
            $table->string('nama_wanita');
            $table->date('tanggal_akad');
            $table->date('tanggal_resepsi');
            $table->string('waktu_akad');
            $table->string('waktu_resepsi');
            $table->string('alamat_akad');
            $table->string('alamat_resepsi');
            $table->string('gmaps_akad')->nullable();
            $table->string('gmaps_resepsi')->nullable();
            $table->string('foto_pria')->nullable();
            $table->string('foto_wanita')->nullable();
            $table->string('foto_hero')->nullable();
            $table->string('ortu_pria')->nullable();
            $table->string('ortu_wanita')->nullable();
            $table->string('no_rekening')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('nama_pemilik')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_waddings');
    }
};
