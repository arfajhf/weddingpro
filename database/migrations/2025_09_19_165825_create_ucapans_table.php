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
        Schema::create('ucapans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('weding_id');
            $table->string('nama');
            $table->text('ucapan');
            $table->string('kehadiran')->nullable();

            $table->foreign('weding_id')->references('id')->on('user_waddings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ucapans');
    }
};
