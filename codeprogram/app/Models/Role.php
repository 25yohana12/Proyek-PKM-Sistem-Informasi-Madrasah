<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'role';

    // Tentukan primary key jika bukan 'id'
    protected $primaryKey = 'role_id';

    // Tentukan kolom yang bisa diisi (fillable) untuk menghindari mass-assignment vulnerability
    protected $fillable = ['namaRole', 'deskripsi'];

    // Menentukan tipe data untuk kolom tertentu jika diperlukan
    protected $casts = [
        'namaRole' => 'string',
        'deskripsi' => 'string',
    ];

    // Jika Anda menggunakan relasi, misalnya admin memiliki satu role
    public function admins()
    {
        return $this->hasMany(Admin::class, 'role_id');
    }
}
