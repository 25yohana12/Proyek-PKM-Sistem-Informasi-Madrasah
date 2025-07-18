<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cek apakah sudah ada data role dengan ID 1
        $exists = DB::table('role')->where('role_id', 1)->exists();
        
        if (!$exists) {
            DB::table('role')->insert([
                'role_id' => 1,
                'namaRole' => 'Super Admin', // Sesuai dengan enum yang ada
                'deskripsi' => 'Super Administrator dengan akses penuh',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            echo "Role Super Admin berhasil ditambahkan!\n";
        } else {
            echo "Role Super Admin sudah ada!\n";
        }

        // Cek apakah sudah ada data role dengan ID 2
        $existsAdmin = DB::table('role')->where('role_id', 2)->exists();
        
        if (!$existsAdmin) {
            DB::table('role')->insert([
                'role_id' => 2,
                'namaRole' => 'Admin', // Role untuk Admin
                'deskripsi' => 'Administrator dengan akses terbatas',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            echo "Role Admin berhasil ditambahkan!\n";
        } else {
            echo "Role Admin sudah ada!\n";
        }
    }
}
