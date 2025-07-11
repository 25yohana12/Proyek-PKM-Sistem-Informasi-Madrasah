<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak sesuai dengan nama default
    protected $table = 'prestasi';
    
     // Menentukan kolom primary key yang digunakan
    protected $primaryKey = 'prestasi_id'; // Menentukan kolom primary key

    // Menentukan kolom mana saja yang dapat diisi (mass assignable)
    protected $fillable = [
        'superAdmin_id', // ID dari super admin
        'nama',          // Nama prestasi
        'penghargaan',   // Penghargaan
        'judul',         // Judul prestasi
        'deskripsi',     // Deskripsi prestasi
        'gambar',        // Gambar prestasi
    ];

    // Jika Anda ingin mendefinisikan relasi dengan model SuperAdmin
    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class, 'superAdmin_id');
    }
}
