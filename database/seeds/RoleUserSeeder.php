<?php

use App\User;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $roles = ['1', '2', '3'];
        $user->roles()->attach($roles);
        
        $user = User::find(2);
        $roles = ['2'];
        $user->roles()->attach($roles);
        
        $user = User::find(3);
        $roles = ['2', '3'];
        $user->roles()->attach($roles);
        
        $user = User::find(4);
        $roles = ['4'];
        $user->roles()->attach($roles);
        
        // $user = User::find(3);
        // $roles = ['3'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(4);
        // $roles = ['3', '4'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(5);
        // $roles = ['3', '4'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(6);
        // $roles = ['3', '4'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(7);
        // $roles = ['3', '4'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(8);
        // $roles = ['3', '4'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(9);
        // $roles = ['3', '4'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(10);
        // $roles = ['4'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(11);
        // $roles = ['5'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(12);
        // $roles = ['5'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(13);
        // $roles = ['5'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(14);
        // $roles = ['5'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(15);
        // $roles = ['5'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(16);
        // $roles = ['5'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(17);
        // $roles = ['5'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(18);
        // $roles = ['5'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(19);
        // $roles = ['5'];
        // $user->roles()->attach($roles);
        
        // $user = User::find(20);
        // $roles = ['5'];
        // $user->roles()->attach($roles);
    }
}
