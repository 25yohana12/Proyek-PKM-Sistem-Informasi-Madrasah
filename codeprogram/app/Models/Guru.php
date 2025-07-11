<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'guru';

    // Tentukan nama kolom primary key yang digunakan di tabel guru
    protected $primaryKey = 'guru_id'; // Ganti dengan kolom yang sesuai

    // Kolom yang dapat diisi
    protected $fillable = [
        'superAdmin_id',
        'namaGuru',
        'gambar',
        'nip',
        'posisi',
        'deskripsi',
    ];

    // Mendefinisikan relasi dengan tabel super_admin
    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class, 'superAdmin_id');
    }
}
