<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan plural dari nama model
    protected $table = 'galeri';

    // Tentukan primary key yang digunakan oleh model ini
    protected $primaryKey = 'galeri_id';  // Menggunakan galeri_id sebagai primary key

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'superAdmin_id',
        'judul',
        'deskripsi',
        'gambar',
    ];

    // Tentukan kolom yang tidak boleh diubah (guarded)
    // protected $guarded = [];

    /**
     * Mendefinisikan relasi ke model SuperAdmin
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class, 'superAdmin_id');
    }
}
