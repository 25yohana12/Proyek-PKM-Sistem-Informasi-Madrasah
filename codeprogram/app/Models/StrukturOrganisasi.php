<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     * (Perlu didefinisikan karena memakai camelCase,
     *  bukan snake_case bawaan Laravel.)
     */
    protected $table = 'strukturOrganisasi';

    /**
     * Primary key kustom.
     */
    protected $primaryKey = 'jabatan_id';
    protected $keyType    = 'int';
    public    $incrementing = true;

    /**
     * Kolom yang boleh di‑mass‑assign.
     */
    protected $fillable = [
        'superAdmin_id',
        'namaGuru',
        'nip',
        'jabatan',
        'gambar',
    ];

    /**
     * Relasi: setiap strukturOrganisasi
     * dimiliki oleh satu superAdmin.
     */
    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class, 'superAdmin_id', 'superAdmin_id');
    }
}
