<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
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
                'name' => 'Alimul Islam',
                'email' => 'alimul@gmail.com',
                'phone' => '01781342259',
                'address' => 'Rampura,Dhaka',
                'role_id' => 1,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'password' => '$2y$10$ax3KkK9jJcoN1LXcNuleRukIzjBCoU36Fpg5JZVx29hBp6j5POxZ6',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'email_verified_at' => NULL,
                'remember_token' => NULL,
                'created_at' => '2023-08-13 19:51:36',
                'updated_at' => '2023-08-13 21:46:25',
            ),
        ));
        
        
    }
}