<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Admin',
                'created_at' => '2023-08-13 21:17:50',
                'updated_at' => '2023-08-13 21:17:50',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Admin',
                'created_at' => '2023-08-13 21:17:55',
                'updated_at' => '2023-08-13 21:18:11',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Employee',
                'created_at' => '2023-08-13 21:18:01',
                'updated_at' => '2023-08-13 21:18:01',
            ),
        ));
        
        
    }
}