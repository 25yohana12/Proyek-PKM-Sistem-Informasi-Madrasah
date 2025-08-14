<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    // Nama tabel (jika tidak sesuai konvensi Laravel)
    protected $table = 'pengumumen';

    // Kolom yang boleh diisi massal
    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
    ];

}