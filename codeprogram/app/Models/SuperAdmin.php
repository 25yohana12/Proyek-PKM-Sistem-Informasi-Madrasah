<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuperAdmin extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nama tabel di database
    protected $table = 'superAdmin';  // sesuaikan dengan nama tabelmu
    protected $primaryKey = 'superAdmin_id'; // primary key

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'nama', 
        'email', 
        'sandi', 
        'profil',
        'role_id'
    ];

    // Kolom yang disembunyikan saat ke array/JSON
    protected $hidden = [
        'sandi', 
        'remember_token'
    ];

    // Otomatis hash password saat disimpan
    public function setSandiAttribute($value)
    {
        $this->attributes['sandi'] = bcrypt($value);
    }

    // Memberi tahu Laravel kolom password untuk Auth
    public function getAuthPassword()
    {
        return $this->sandi;
    }

    // Relasi ke role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    // Relasi ke guru
    public function gurus()
    {
        return $this->hasMany(Guru::class, 'superAdmin_id', 'superAdmin_id');
    }
}
