<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id', 'id');
    }

    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'rombel_id', 'id');
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
