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
        Schema::table('user_waddings', function (Blueprint $table) {
            $table->string('template', 50)->default('weddingpro-1')->nullable()->after('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_waddings', function (Blueprint $table) {
            $table->dropColumn('template');
        });
    }
};
