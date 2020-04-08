<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $guarded = [];

    public function rombels()
    {
        return $this->hasMany(Rombel::class, 'jurusan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
