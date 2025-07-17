<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan RoleSeeder dulu, baru SuperAdminSeeder
        $this->call([
            RoleSeeder::class,
            SuperAdminSeeder::class,
        ]);
    }
}