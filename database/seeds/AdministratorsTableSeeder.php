<?php

use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Administrator::class, 3)->create([
            'password' => bcrypt('peter007'),
        ]);
    }
}
