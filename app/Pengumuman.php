<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $guarded = [];

    public function pengumuman_readed()
    {
        return $this->hasMany(PengumumanReaded::class, 'pengumuman_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
