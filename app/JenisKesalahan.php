<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisKesalahan extends Model
{
    protected $guarded = [];

    public function laporkan_kesalahan()
    {
        return $this->hasMany(LaporkanKesalahan::class, 'jenis_kesalahan_id', 'id');
    }
}
