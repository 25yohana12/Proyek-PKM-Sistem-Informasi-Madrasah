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
        Schema::table('strukturOrganisasi', function (Blueprint $table) {
            // Menambahkan kolom baru
            $table->enum('jenis', ['Guru', 'Staff'])->after('nip');
            $table->string('pendidikan_terakhir', 100)->nullable()->after('jenis');
            $table->date('tanggal_lahir')->nullable()->after('pendidikan_terakhir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('strukturOrganisasi', function (Blueprint $table) {
            // Hapus kolom jika rollback
            $table->dropColumn(['jenis', 'pendidikan_terakhir', 'tanggal_lahir']);
        });
    }
};
