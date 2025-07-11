<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkstrakulikulerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekstrakulikuler', function (Blueprint $table) {
            $table->id('ekstrakulikuler_id'); // Kolom ID untuk ekstrakurikuler
            $table->unsignedBigInteger('superAdmin_id')->default(1); // Default 1 untuk superAdmin_id
            $table->string('namaekstrakulikuler', 255); // Nama Ekstrakurikuler
            $table->text('deskripsi'); // Deskripsi Ekstrakurikuler
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
        Schema::dropIfExists('ekstrakulikuler');
    }
}
