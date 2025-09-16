<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE dataPendaftar MODIFY agama ENUM('Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu') NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE dataPendaftar MODIFY agama ENUM('Islam') NULL");
    }
};
