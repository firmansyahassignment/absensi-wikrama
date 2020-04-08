<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    protected $guarded = [];

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'rombel_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function absens()
    {
        return $this->hasMany(Absen::class, 'rombel_id', 'id');
    }

    public function rombel_absen_range(array $range)
    {
        $range = format_range($range);
        return $this->absens->whereBetween('tanggal_absen', $range);
    }
}
