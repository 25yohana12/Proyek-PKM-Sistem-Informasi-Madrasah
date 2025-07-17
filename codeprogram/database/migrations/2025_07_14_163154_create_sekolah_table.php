<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id('sekolah_id'); // Primary key
            $table->string('namaSekolah', 255);
            $table->string('alamat', 255);
            $table->string('telepon', 50);
            $table->string('email', 255);
            $table->string('instagram', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sekolah');
    }
}
