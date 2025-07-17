<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('siswa_id'); // Primary key
            $table->unsignedBigInteger('superAdmin_id')->default(1); // Foreign key dengan default 1

            $table->integer('jumlahMurid')->nullable();
            $table->integer('jumlahSiswa')->nullable();
            $table->integer('jumlahSiswi')->nullable();

            $table->string('kelas', 255)->nullable();
            $table->string('namaWali', 255)->nullable();
            $table->string('gambar', 255)->nullable();

            $table->integer('murid')->nullable();
            $table->integer('siswa')->nullable();
            $table->integer('siswi')->nullable();

            $table->timestamps(); // created_at dan updated_at

            // Foreign key constraint
            $table->foreign('superAdmin_id')
                  ->references('superAdmin_id')
                  ->on('superAdmin')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
