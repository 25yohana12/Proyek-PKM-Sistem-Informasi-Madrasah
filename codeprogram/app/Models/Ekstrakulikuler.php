<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'ekstrakulikuler';

    // Tentukan nama kolom primary key yang digunakan di tabel ekstrakulikuler
    protected $primaryKey = 'ekstrakulikuler_id';

    // Kolom yang dapat diisi
    protected $fillable = [
        'superAdmin_id',
        'namaekstrakulikuler',
        'deskripsi',
        'gambar',
    ];

    // Mendefinisikan relasi dengan tabel superAdmin
    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class, 'superAdmin_id', 'superAdmin_id');
    }
}
