<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisPrestasiToPrestasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestasi', function (Blueprint $table) {
            $table->enum('jenis_prestasi', ['akademik', 'non-akademik'])
                  ->after('gambar')
                  ->default('akademik'); // kasih default biar data lama tetap aman
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prestasi', function (Blueprint $table) {
            $table->dropColumn('jenis_prestasi');
        });
    }
}
