<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id('prestasi_id'); // Kolom ID untuk prestasi
            $table->unsignedBigInteger('superAdmin_id')->default(1); // Default 1 untuk superAdmin_id
            $table->string('nama', 255); // Nama Prestasi
            $table->string('penghargaan', 255); // Penghargaan yang diterima
            $table->string('judul', 255); // Judul prestasi
            $table->text('deskripsi'); // Deskripsi prestasi
            $table->string('gambar', 255)->nullable(); // Gambar (path) - nullable
            $table->timestamps(); // created_at dan updated_at

            // Mendefinisikan relasi foreign key ke tabel superAdmin
            $table->foreign('superAdmin_id')->references('superAdmin_id')->on('superAdmin')->onDelete('cascade'); // Relasi ke tabel superAdmin
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestasi');
    }
}
