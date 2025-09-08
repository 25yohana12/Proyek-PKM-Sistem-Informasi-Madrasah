<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    // Tentukan nama tabel yang sesuai
    protected $table = 'superAdmin';  // Nama tabel yang Anda sebutkan

    // Kolom yang disembunyikan saat mengubah model ke array atau JSON
    protected $hidden = [
        'sandi', // Menyembunyikan kolom sandi
    ];

    // Relasi dengan tabel Role (banyak ke satu)
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    // Menyembunyikan password yang terenkripsi saat menampilkan model
    public function getSandiAttribute($value)
    {
        try {
            return decrypt($value); // Dekripsi password
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Log error atau kembalikan nilai default jika dekripsi gagal
            \Log::error('Gagal mendekripsi password: ' . $e->getMessage());
            return null; // Atau nilai default yang diinginkan
        }
    }

    // Menambahkan password enkripsi sebelum menyimpannya
    public function setSandiAttribute($value)
    {
        // Pastikan bahwa password yang diterima dienkripsi sebelum disimpan
        $this->attributes['sandi'] = encrypt($value); // Enkripsi password
    }

    // Relasi dengan model Guru
    public function gurus()
    {
        return $this->hasMany(Guru::class, 'superAdmin_id', 'superAdmin_id');
    }
}
