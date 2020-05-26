<?php

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
        $admin = \App\Admin::whereEmail('info@mactavis.com')->first();

        if (!$admin) {
            \App\Admin::create([
                'name' => 'Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('winners'),
                'email' => 'info@mactavis.com',
            ]);

        }
    }
}
