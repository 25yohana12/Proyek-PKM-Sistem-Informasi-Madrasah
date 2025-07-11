<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'superAdmin';

    // Kolom yang dapat diisi secara massal (mass assignment)
    protected $fillable = [
        'role_id', 
        'namaSuperAdmin', 
        'email', 
        'sandi',
    ];

    // Kolom yang akan dikecualikan dari mass assignment (jika ada kolom sensitif)
    protected $guarded = [];

    // Kolom yang disembunyikan saat mengubah model ke array atau JSON
    protected $hidden = [
        'sandi',
    ];

    // Relasi dengan tabel Role (banyak ke satu)
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    // Menyembunyikan password yang terenkripsi saat menampilkan model
    public function getSandiAttribute($value)
    {
        return decrypt($value); // Jika Anda menggunakan enkripsi untuk password
    }

    // Menambahkan password enkripsi sebelum menyimpannya
    public function setSandiAttribute($value)
    {
        $this->attributes['sandi'] = encrypt($value); // Enkripsi password
    }

    // Jika Anda ingin menambahkan relasi dengan model Guru
    public function gurus()
    {
        return $this->hasMany(Guru::class, 'superAdmin_id', 'superAdmin_id');
    }

        public function acaras()
    {
        return $this->hasMany(Acara::class, 'superAdmin_id');
    }
}