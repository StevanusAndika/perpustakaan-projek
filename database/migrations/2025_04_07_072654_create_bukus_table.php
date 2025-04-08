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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->year('tahun_terbit');
            $table->string('isbn')->unique();
            $table->unsignedBigInteger('kategori_id');
            $table->integer('jumlah');
            
             $table->string('cover_path')->nullable();     // Contoh: 'uploads/covers/'
             $table->string('cover_filename')->nullable(); // Contoh: 'cover_buku1.jpg'
            
            $table->enum('status', ['tersedia', 'dipinjam'])->default('tersedia');
            
            $table->timestamps();
        
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
