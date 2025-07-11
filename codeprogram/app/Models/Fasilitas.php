<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    // Menentukan nama tabel (jika tidak sesuai dengan penamaan default)
    protected $table = 'fasilitas';

    // Tentukan nama kolom primary key jika bukan 'id'
    protected $primaryKey = 'fasilitas_id';

    // Menentukan kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'superAdmin_id',
        'namaFasilitas',
        'prasarana',
        'sarana',
        'jumlah',
        'gambar',
    ];

    // Menentukan kolom yang tidak boleh diisi (protected)
    protected $guarded = [
        'fasilitas_id',
    ];

    // Relasi dengan model SuperAdmin
    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class, 'superAdmin_id');
    }
}
