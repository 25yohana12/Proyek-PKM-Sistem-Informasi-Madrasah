<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';          // Nama tabel
    protected $primaryKey = 'sekolah_id';  // Primary key bukan 'id'

    protected $fillable = [
        'namaSekolah',
        'alamat',
        'telepon',
        'email',
        'instagram',
        'facebook',
    ];

    public $timestamps = true; // Aktifkan timestamps (created_at & updated_at)
}
