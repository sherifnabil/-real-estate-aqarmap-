<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'first_name'    => 'sherif',
            'last_name'    => 'nabil',
            'phone'    => '01111111111',
            'user_type'    => 'admin',
            // 'username'    => 'sherif',
            'email'    => 'sherif@s.com',
            'city_id'    => 2,
            'state_id'    => 1,
            'address'    => '18 st zone cairo ',
            'password'    => bcrypt('111111'),
        ]);
    }
}
