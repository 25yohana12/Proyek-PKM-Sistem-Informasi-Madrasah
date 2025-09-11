<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'admin_id';

    protected $fillable = ['role_id', 'namaAdmin', 'nip', 'profil', 'email', 'sandi'];

    protected $hidden = ['sandi', 'remember_token'];

    public function setSandiAttribute($value)
    {
        $this->attributes['sandi'] = bcrypt($value);
    }

    public function getAuthPassword()
{
    return $this->sandi;
}

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function superAdmin()
    {
        return $this->belongsTo(SuperAdmin::class, 'superAdmin_id');
    }
}
