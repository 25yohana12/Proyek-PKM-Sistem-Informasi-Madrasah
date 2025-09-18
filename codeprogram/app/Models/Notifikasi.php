<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $fillable = [
        'judul',
        'pesan',
        'read',
        'data_id',
        'user_id',
    ];

    public function pendaftar()
{
    return $this->belongsTo(DataPendaftar::class, 'data_id', 'pendaftar_id');
}
}
