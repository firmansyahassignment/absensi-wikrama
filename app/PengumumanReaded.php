<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengumumanReaded extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pengumuman()
    {
        return $this->belongsTo(Pengumuman::class, 'pengumuman_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
