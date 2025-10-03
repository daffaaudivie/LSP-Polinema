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
        Schema::create('surat', function (Blueprint $table) {
    $table->id();
    $table->string('nomor', 50)->unique();
    $table->string('judul');
    $table->string('file'); // path ke file pdf
    $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
