<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dataPendaftar', function (Blueprint $table) {
            $table->id('pendaftar_id');              // Primary Key

            // Fixed reference columns
            $table->unsignedBigInteger('superAdmin_id')->default(1);
            $table->unsignedBigInteger('role_id')->default(3);

            // --- Data Pribadi -------------------------------------------------
            $table->string('namaPendaftar', 255);
            $table->string('email', 255)->unique();
            $table->string('sandi', 255);            // Password (hash)
            $table->string('nisn', 50)->nullable();
            $table->enum('kewarganegaraan', ['Warga Negara Indonesia', 'Warga Negara Asing']);
            $table->string('nik', 50)->nullable();
            $table->string('tempatLahir', 255)->nullable();
            $table->date('tanggalLahir')->nullable();
            $table->enum('jenisKelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->integer('jumlahSaudara')->nullable();
            $table->integer('anakKe')->nullable();
            $table->enum('agama', ['Islam'])->nullable();
            $table->string('citaCita', 255)->nullable();
            $table->string('telepon', 50)->nullable();
            $table->string('hobi', 255)->nullable();
            $table->enum('pembiaya', ['OrangTua','Beasiswa','Lainnya'])->nullable();
            $table->enum('kebutuhanKhusus', [
                'Tidak','Netra','Rungu','Wicara','Daksa','Grahita','DownSyndrome','Autis','Lainnya'
            ])->nullable();
            $table->string('praSekolah', 255)->nullable();

            // --- Keluarga -----------------------------------------------------
            $table->string('noKartuKeluarga', 50)->nullable();
            $table->string('kepalaKeluarga', 255)->nullable();
            $table->text('fotoKartuKeluarga')->nullable();
            $table->text('fotoAkteLahir')->nullable();
            $table->text('fotoPendaftar')->nullable();

            // Ayah
            $table->string('namaAyah', 255)->nullable();
            $table->enum('statusAyah', ['Hidup','Meninggal'])->nullable();
            $table->string('nikAyah', 20)->nullable();
            $table->string('tempatLahirAyah', 100)->nullable();
            $table->date('tanggalLahirAyah')->nullable();
            $table->enum('pendidikanAyah', ['SD','SMP','SMA','D3','S1','S2','S3'])->nullable();
            $table->string('pekerjaanAyah', 255)->nullable();
            $table->enum('pendapatanAyah', ['<1juta','1-3juta','3-5juta','>5juta'])->nullable();

            // Ibu
            $table->string('namaIbu', 255)->nullable();
            $table->enum('statusIbu', ['Hidup','Meninggal'])->nullable();
            $table->string('nikIbu', 20)->nullable();
            $table->string('tempatLahirIbu', 100)->nullable();
            $table->date('tanggalLahirIbu')->nullable();
            $table->enum('pendidikanIbu', ['SD','SMP','SMA','D3','S1','S2','S3'])->nullable();
            $table->string('pekerjaanIbu', 255)->nullable();
            $table->enum('pendapatanIbu', ['<1juta','1-3juta','3-5juta','>5juta'])->nullable();

            // Wali (opsional)
            $table->string('namaWali', 255)->nullable();
            $table->enum('statusWali', ['Hidup','Meninggal'])->nullable();
            $table->string('nikWali', 20)->nullable();
            $table->string('tempatLahirWali', 100)->nullable();
            $table->date('tanggalLahirWali')->nullable();
            $table->enum('pendidikanWali', ['SD','SMP','SMA','D3','S1','S2','S3'])->nullable();
            $table->string('pekerjaanWali', 255)->nullable();
            $table->enum('pendapatanWali', ['<1juta','1-3juta','3-5juta','>5juta'])->nullable();

            // --- Alamat & Transport ------------------------------------------
            $table->string('provinsi', 255)->nullable();
            $table->string('kabupaten', 255)->nullable();
            $table->enum('statusRumah', ['Milik Sendiri','Sewa','Kontrak','Menumpang'])->nullable();
            $table->string('kecamatan', 255)->nullable();
            $table->string('desa', 255)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('jarakRumah', 255)->nullable();
            $table->enum('kendaraan', ['Jalan Kaki','Sepeda','Motor','Mobil','Angkutan Umum'])->nullable();
            $table->enum('waktuPerjalanan', ['<15m','15-30m','30-60m','>60m'])->nullable();

            // --- Lain‑lain ----------------------------------------------------
            $table->enum('konfirmasi', ['Belum','Diterima','Ditolak'])->default('Belum');

            $table->timestamps(); // created_at & updated_at

            /* ---------------------------------------------------------------
             | OPTIONAL: Foreign‑key constraints ─ uncomment bila dibutuhkan
             |----------------------------------------------------------------
             |
             | $table->foreign('superAdmin_id')->references('superAdmin_id')
             |       ->on('super_admins')->cascadeOnDelete();
             | $table->foreign('role_id')->references('id')->on('roles');
             |
             */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataPendaftar');
    }
};
