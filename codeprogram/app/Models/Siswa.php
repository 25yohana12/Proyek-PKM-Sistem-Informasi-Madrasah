<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa'; // Nama tabel
    protected $primaryKey = 'siswa_id'; // Primary key

    protected $fillable = [
        'superAdmin_id',
        'jumlahMurid',
        'jumlahSiswa',
        'jumlahSiswi',
        'kelas',
        'namaWali',
        'gambar',
        'murid',
        'siswa',
        'siswi',
    ];

    /**
     * Relasi ke model SuperAdmin
     */
    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class, 'superAdmin_id', 'superAdmin_id');
    }
}
