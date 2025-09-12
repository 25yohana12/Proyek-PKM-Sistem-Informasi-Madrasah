<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('dataPendaftar', function (Blueprint $table) {
            if (!Schema::hasColumn('dataPendaftar', 'pekerjaanAyah')) {
                $table->string('pekerjaanAyah', 255)->nullable();
            }
        });
    }
    public function down()
    {
        Schema::table('dataPendaftar', function (Blueprint $table) {
            $table->dropColumn('pekerjaanAyah');
        });
    }
};
