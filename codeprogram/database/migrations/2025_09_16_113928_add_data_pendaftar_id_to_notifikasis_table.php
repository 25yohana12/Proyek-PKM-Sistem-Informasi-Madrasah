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
        Schema::table('notifikasis', function (Blueprint $table) {
            $table->unsignedBigInteger('dataPendaftar_id')->nullable()->after('user_id');

            // kalau mau langsung relasi FK (opsional)
            // $table->foreign('dataPendaftar_id')->references('id')->on('data_pendaftars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notifikasis', function (Blueprint $table) {
            $table->dropColumn('dataPendaftar_id');
            // kalau pakai foreign key
            // $table->dropForeign(['dataPendaftar_id']);
        });
    }
};
