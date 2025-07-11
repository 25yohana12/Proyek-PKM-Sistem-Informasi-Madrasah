<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id('admin_id'); // Kolom ID untuk admin
            $table->unsignedBigInteger('role_id'); // Kolom role_id sebagai foreign key
            $table->unsignedBigInteger('superAdmin_id')->default(1); // Menambahkan default 1 untuk superAdmin_id
            $table->string('namaAdmin', 255); // Nama Admin
            $table->string('nip', 50); // NIP Admin
            $table->string('profil', 255); // Profil Admin
            $table->string('email', 255)->unique(); // Email Admin yang harus unik
            $table->string('sandi', 255); // Sandi (password)
            $table->timestamps(); // created_at dan updated_at

            // Mendefinisikan foreign key untuk role_id yang merujuk ke tabel 'role'
            $table->foreign('role_id')->references('role_id')->on('role')->onDelete('cascade'); // Relasi ke tabel role
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
        Schema::dropIfExists('admin');
    }
}
