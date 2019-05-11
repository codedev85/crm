<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$VTohEtTA0OL7cw21o.OB6.MSm1yDQE.bWeO6tBIV0Fkb2shofm3Wq', //password
            'role_id' => 1 ,//admin
            'company_id' => 1 
        ]);
      
    }
}
