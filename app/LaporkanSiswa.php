<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporkanSiswa extends Model
{
    protected $guarded = [];
    
    public function laporkan_siswa_readed()
    {
        return $this->hasMany(LaporkanSiswaReaded::class, 'laporkan_siswa_id', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function rayon()
    {
        return $this->belongsTo(Rayon::class, 'rayon_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
