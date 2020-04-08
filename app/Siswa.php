<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = [];

    public function absens()
    {
        return $this->hasMany(Absen::class, 'siswa_id', 'id');
    }

    public function rayon()
    {
        return $this->belongsTo(Rayon::class, 'rayon_id');
    }

    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'rombel_id');
    }

    public function orangtua()
    {
        return $this->belongsTo(User::class, 'orangtua_id');
    }

    public function absen_range(array $range, $keterangan)
    {
        $range = format_range($range);
        $data = $this->absens->whereBetween('tanggal_absen', $range);
        if ($keterangan != '') {
            return $data->where('keterangan', $keterangan);
        }

        return $data;
    }

    public function laporkan_siswa()
    {
        return $this->hasMany(LaporkanSiswa::class, 'siswa_id', 'id');
    }

}
