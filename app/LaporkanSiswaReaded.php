<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporkanSiswaReaded extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function laporkan_siswa()
    {
        return $this->belongsTo(LaporkanSiswa::class, 'laporkan_siswa_id', 'id');
    }
}
