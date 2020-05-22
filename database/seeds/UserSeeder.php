<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'bee@gmail.com')->first();
    

    if (!$user) {
         User::create([

            'first_name' => 'bless',

            'last_name' => 'me',

            'middle_name' => 'you',

            'email' => 'bee@gmail.com',
         ]);
        
    }
}

}