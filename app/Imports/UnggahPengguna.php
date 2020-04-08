<?php

namespace App\Imports;

use App\Rayon;
use App\Role;
use App\Siswa;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnggahPengguna implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {

        $role = str_replace(', ', ',', $row['sebagai']);
        $role = explode(',', $role);
        $find_role_id = [];
        for ($i=0; $i < count($role); $i++) { 
            $find_role_id[] = Role::where('role', 'LIKE', '%'.$role[$i].'%')->first()->id ?? '';
        }

        $username = strtolower(str_replace(' ', '.',$row['nama']) . rand(10, 99));
        $password = Hash::make($username);
        
        $user = User::create([
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'phone' => $row['no_telepon'] ?? null,
            'email' => $row['email'] ?? null,
            'username' => $username,
            'password' => $password
        ]);

        $user->roles()->attach($find_role_id);
    }
}
