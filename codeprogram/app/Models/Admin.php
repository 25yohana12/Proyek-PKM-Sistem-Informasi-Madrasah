<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'admin';
    
    protected $primaryKey = 'admin_id';

    // Tentukan kolom yang dapat diisi (fillable) untuk menghindari mass-assignment vulnerability
    protected $fillable = ['role_id', 'namaAdmin', 'nip', 'profil', 'email', 'sandi'];

    // Tentukan relasi dengan model Role (jika ada)
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); // Relasi ke tabel role
    }

    // Jika menggunakan hashing password
    public function setSandiAttribute($value)
    {
        $this->attributes['sandi'] = bcrypt($value); // Menggunakan bcrypt untuk password
    }

    public function superAdmin()
{
    return $this->belongsTo(SuperAdmin::class, 'superAdmin_id');
}
}
