<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    protected $guarded = [];

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }

    public function pembimbing()
    {
        return $this->belongsTo(User::class, 'pembimbing_id');
    }

    public function absens()
    {
        return $this->hasMany(Absen::class, 'rayon_id', 'id');
    }

    public function laporkan_siswa()
    {
        return $this->hasMany(LaporkanSiswa::class, 'rayon_id', 'id');
    }
}
