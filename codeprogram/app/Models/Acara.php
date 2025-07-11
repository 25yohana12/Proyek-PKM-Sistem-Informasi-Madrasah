<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan plural dari nama model
    protected $table = 'acara';  // Nama tabel yang digunakan

    // Tentukan primary key yang digunakan oleh model ini
    protected $primaryKey = 'acara_id';  // Menggunakan acara_id sebagai primary key

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'superAdmin_id',
        'judul',
        'deskripsi',
        'tanggalAcara',
        'gambar',
    ];

    // Kolom yang tidak boleh diubah (guarded)
    // protected $guarded = [];

    // Relasi ke model SuperAdmin
    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class, 'superAdmin_id');
    }
}
