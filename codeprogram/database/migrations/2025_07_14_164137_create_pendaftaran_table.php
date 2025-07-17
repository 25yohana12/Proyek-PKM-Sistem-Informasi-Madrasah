<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasiPendaftaran', function (Blueprint $table) {
            $table->id('informasi_id'); // Primary key
            $table->string('tahunAjaran', 50);
            $table->date('tanggalPendaftaran');
            $table->date('tanggalPengumuman');
            $table->date('tanggalPenutupan');
            $table->integer('jumlahSiswa');
            $table->text('pengumuman')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasiPendaftaran');
    }
}
