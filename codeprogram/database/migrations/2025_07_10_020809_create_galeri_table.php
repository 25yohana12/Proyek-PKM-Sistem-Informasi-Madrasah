<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->id('galeri_id'); // Kolom ID untuk galeri
            $table->unsignedBigInteger('superAdmin_id')->default(1); // Default 1 untuk superAdmin_id
            $table->string('judul', 255); // Judul galeri
            $table->text('deskripsi'); // Deskripsi galeri
            $table->longText('gambar'); // Gambar galeri
            $table->timestamps(); // created_at dan updated_at

            // Mendefinisikan relasi foreign key ke tabel superAdmin
            $table->foreign('superAdmin_id')->references('superAdmin_id')->on('superAdmin')->onDelete('cascade'); // Relasi ke tabel super_admins
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeri');
    }
}
