<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->longText('deskripsi');
            $table->string('berat');
            $table->longText('spesifikasi');
            $table->longText('manfaat');
            $table->longText('keunggulan');
            $table->text('penyimpanan');
            $table->string('gambar')->nullable();
            $table->string('whatsapp');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
