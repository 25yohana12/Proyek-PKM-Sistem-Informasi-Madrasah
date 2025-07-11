<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acara', function (Blueprint $table) {
            $table->id('acara_id'); // Kolom ID untuk acara
            $table->unsignedBigInteger('superAdmin_id')->default(1); // Default 1 untuk superAdmin_id
            $table->string('judul', 255); // Judul acara
            $table->longText('deskripsi'); // Deskripsi acara
            $table->date('tanggalAcara'); // Tanggal acara
            $table->longText('gambar'); // Gambar acara
            $table->timestamps(); // created_at dan updated_at

            // Mendefinisikan relasi foreign key ke tabel super_admins
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
        Schema::dropIfExists('acara');
    }
}
