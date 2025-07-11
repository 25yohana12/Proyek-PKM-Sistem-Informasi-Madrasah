<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superAdmin', function (Blueprint $table) {
            $table->id('superAdmin_id'); // Kolom ID untuk superAdmin
            $table->unsignedBigInteger('role_id'); // Menggunakan unsignedBigInteger untuk role_id
            $table->string('namaSuperAdmin', 255); // Nama Super Admin
            $table->string('email', 255)->unique(); // Email yang harus unik
            $table->string('sandi', 255); // Sandi (password)
            $table->timestamps(); // created_at dan updated_at

            // Mendefinisikan relasi foreign key ke tabel 'role'
            $table->foreign('role_id')->references('role_id')->on('role')->onDelete('cascade'); // Relasi ke tabel role
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('super_admin');
    }
}
