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
        Schema::create('spme_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('category', [
                'akreditasi_nasional',
                'akreditasi_internasional',
                'cakupan_lam',
                'instrumen_panduan'
            ])->default('akreditasi_nasional');
            $table->string('file_path')->nullable();
            $table->string('external_link')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spme_items');
    }
};
