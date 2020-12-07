<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => Hash::make("admin"),
                'created_at' => Carbon::now(),
                'updated_at' => NULL,
            ),
        ));
    }
}
