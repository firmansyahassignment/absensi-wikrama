<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Piket dan Kurikulum',
            'Guru',
            'Pembimbing Rayon',
            'Orangtua'
        ];

        for ($i=0; $i < count($roles); $i++) { 
            Role::create([
                'role' => $roles[$i]
            ]);
        }
    }
}
