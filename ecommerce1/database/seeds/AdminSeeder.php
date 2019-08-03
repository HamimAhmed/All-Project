<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name'  => 'admin',
            'address' => 'dhanmondi',
            'email' => 'adminpanel@gmail.com',
            'contact_no' => '097663883',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
             'role' => 'admin',
        ]);
    }
}
