<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk_kerajinan', function (Blueprint $table) {
            $table->id();
            $table->string('id_produk')->unique();
            $table->string('gambar')->nullable();
            $table->string('nama_produk');
            $table->string('bahan');
            $table->decimal('harga', 10, 2);
            $table->string('pengrajin');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk_kerajinan');
    }
};
