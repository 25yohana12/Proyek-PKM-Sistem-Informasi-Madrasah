<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('strukturOrganisasi', function (Blueprint $table) {
            // Primary key
            $table->id('jabatan_id');

            // Foreign key ke tabel superAdmin
            $table->unsignedBigInteger('superAdmin_id')->default(1);

            // Data guru
            $table->string('namaGuru', 255);
            $table->string('nip', 50)->unique();

            // Enum jabatan – sesuaikan opsi enum dengan kebutuhan
            $table->enum('jabatan', [
                'Kepala Sekolah',
                'Wakil Kepala Sekolah',
                'Guru Mata pelajaran',
                'TataUsaha',
                'StafLainnya',
                'Guru Wali Kelas',
                'Guru Ketertiban',
                'kebersiahan',
                'satpam'
            ]);

            // Gambar (URL atau base64, sesuai implementasi Anda)
            $table->text('gambar')->nullable();

            // Timestamps
            $table->timestamps();            // created_at & updated_at
        });

        // Definisi constraint FK ditempatkan di luar callback
        Schema::table('strukturOrganisasi', function (Blueprint $table) {
            $table->foreign('superAdmin_id')
                  ->references('superAdmin_id')
                  ->on('superAdmin')
                  ->onDelete('cascade');     // jika super admin dihapus, record terkait ikut terhapus
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('strukturOrganisasi');
    }
};
