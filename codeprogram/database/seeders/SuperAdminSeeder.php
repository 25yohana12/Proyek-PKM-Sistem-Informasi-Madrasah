<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cek apakah sudah ada data superadmin dengan ID 1
        $exists = DB::table('superadmin')->where('superAdmin_id', 1)->exists();
        
        if (!$exists) {
            DB::table('superadmin')->insert([
                'superAdmin_id' => 1,
                'role_id' => 1, // Kita buat role_id = 1 secara manual
                'namaSuperAdmin' => 'Super Admin', // Kolom yang benar
                'email' => 'admin@mintoba.com',
                'sandi' => Hash::make('admin123'), // Kolom yang benar
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            echo "SuperAdmin berhasil ditambahkan!\n";
        } else {
            echo "SuperAdmin sudah ada!\n";
        }
    }
}