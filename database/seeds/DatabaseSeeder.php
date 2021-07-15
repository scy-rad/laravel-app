<?php

use Database\Seeders\GamesSeeder;
use Database\Seeders\GenresSeeder;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            GenresSeeder::class,
            GamesSeeder::class
        ]);
    }
}
