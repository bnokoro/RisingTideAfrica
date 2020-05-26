<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'naomi@gmail.com')->first();


        if (!$user) {
            User::create([

                'first_name' => 'naomi',

                'last_name' => 'adeola',

                'middle_name' => '',

                'email' => 'naomi@gmail.com',

                'role' => 'admin',

                'password' => Hash::make('asdfghjkl')
            ]);
        }
    }
}
