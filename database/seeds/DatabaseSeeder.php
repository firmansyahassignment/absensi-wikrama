<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(JurusanSeeder::class);   
        $this->call(RombelSeeder::class);    
        $this->call(RayonSeeder::class);  
        $this->call(StudentSeeder::class); 
        // $this->call(StatementSeeder::class);
        // $this->call(AttendanceSeeder::class);
        // $this->call(LaboranSeeder::class);
    }
}
