<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id('fasilitas_id'); // Kolom ID untuk fasilitas
            $table->unsignedBigInteger('superAdmin_id')->default(1); // Default 1 untuk superAdmin_id
            $table->string('namaFasilitas', 255); // Nama fasilitas
            $table->text('prasarana'); // Deskripsi prasarana
            $table->text('sarana'); // Deskripsi sarana
            $table->integer('jumlah'); // Jumlah fasilitas
            $table->longText('gambar')->nullable(); // Gambar fasilitas, nullable
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
        Schema::dropIfExists('fasilitas');
    }
}
