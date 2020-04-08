<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'jenis_kelamin', 'username', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleAttribute()
    {
        return session('role');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function absens()
    {
        return $this->hasMany(Absen::class, 'user_id', 'id');
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'parent_id');
    }

    public function rayons()
    {
        return $this->hasMany(Rayon::class, 'pembimbing_id', 'id');
    }

    // public function kirim_pesan()
    // {
    //     return $this->hasMany(Pesan::class, 'pengirim_id', 'id');
    // }

    public function terima_pesan()
    {
        // return $this->hasMany(Pesan::class, 'penerima_id', 'id');
    }

    public function pengumuman_readed()
    {
        return $this->hasMany(PengumumanReaded::class, 'user_id', 'id');
    }

    public function laporkan_siswa()
    {
        return $this->hasMany(LaporkanSiswa::class, 'user_id', 'id');
    }

    public function laporkan_siswa_readed()
    {
        return $this->hasMany(LaporkanSiswaReaded::class, 'user_id', 'id');
    }
    
}
