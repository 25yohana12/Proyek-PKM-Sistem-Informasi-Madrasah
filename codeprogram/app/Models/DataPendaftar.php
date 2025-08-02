<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendaftar extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'dataPendaftar';

    // The primary key for the model (optional, since it's 'id' by default)
    protected $primaryKey = 'pendaftar_id';

    // If you are using a non-incrementing primary key
    // public $incrementing = false;

    // The attributes that are mass assignable (fillable)
    protected $fillable = [
        'superAdmin_id',
        'role_id',
        'namaPendaftar',
        'email',
        'sandi',
        'nisn',
        'kewarganegaraan',
        'nik',
        'tempatLahir',
        'tanggalLahir',
        'jenisKelamin',
        'jumlahSaudara',
        'anakKe',
        'agama',
        'citaCita',
        'telepon',
        'hobi',
        'pembiaya',
        'kebutuhanKhusus',
        'praSekolah',
        'noKartuKeluarga',
        'kepalaKeluarga',
        'fotoKartuKeluarga',
        'fotoAkteLahir',
        'fotoPendaftar',
        'namaAyah',
        'statusAyah',
        'nikAyah',
        'tempatLahirAyah',
        'tanggalLahirAyah',
        'pendidikanAyah',
        'pekerjaanAyah',
        'pendapatanAyah',
        'namaIbu',
        'statusIbu',
        'nikIbu',
        'tempatLahirIbu',
        'tanggalLahirIbu',
        'pendidikanIbu',
        'pekerjaanIbu',
        'pendapatanIbu',
        'namaWali',
        'statusWali',
        'nikWali',
        'tempatLahirWali',
        'tanggalLahirWali',
        'pendidikanWali',
        'pekerjaanWali',
        'pendapatanWali',
        'provinsi',
        'kabupaten',
        'statusRumah',
        'kecamatan',
        'desa',
        'alamat',
        'jarakRumah',
        'kendaraan',
        'waktuPerjalanan',
        'konfirmasi',
    ];

    // Timestamps for created_at and updated_at
    public $timestamps = true;

    // Optional: Define relationships if needed
    // public function superAdmin()
    // {
    //     return $this->belongsTo(SuperAdmin::class);
    // }
}
