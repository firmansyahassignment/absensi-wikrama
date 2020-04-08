<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporkanKesalahan extends Model
{
    protected $guarded = [];

    public function jenis_kesalahan()
    {
        return $this->belongsTo(JenisKesalahan::class, 'jenis_kesalahan_id', 'id');
    }
}
