<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id('guru_id'); // Kolom ID untuk guru
            $table->unsignedBigInteger('superAdmin_id')->default(1); // Menambahkan default 1 untuk superAdmin_id
            $table->string('namaGuru', 255); // Nama Guru
            $table->string('gambar', 255); // Gambar (path)
            $table->string('nip', 255)->unique(); // NIP yang harus unik
            $table->string('posisi', 255); // Posisi guru
            $table->text('deskripsi'); // Deskripsi
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
        Schema::dropIfExists('guru');
    }
}
