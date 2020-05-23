<?php

use Illuminate\Database\Seeder;

class StagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $stages = ['Ideation', 'Startup', 'Growth', 'Scale-up'];

        DB::table('stages')->truncate();

        foreach ($stages as $stage) {
            \App\Stage::create([
                'name' => $stage
            ]);
    }
}
}