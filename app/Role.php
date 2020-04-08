<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['role'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }

    public function pengumuman_readed()
    {
        return $this->hasMany(PengumumanReaded::class, 'role_id', 'id');
    }
}
