<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'informasiPendaftaran';          // Nama tabel
    protected $primaryKey = 'informasi_id';             // Primary key bukan 'id'

    protected $fillable = [
        'tahunAjaran',
        'tanggalPendaftaran',
        'tanggalPengumuman',
        'tanggalPenutupan',
        'jumlahSiswa',
        'pengumuman',
    ];

    protected $casts = [
        'tanggalPendaftaran' => 'date',
        'tanggalPengumuman' => 'date',
        'tanggalPenutupan' => 'date',
    ];

    public $timestamps = true; // created_at dan updated_at aktif
}