<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->truncate();

        //$new_object=Factory;
        DB::table('genres')->insert([
            [
                'name' => 'RPG',
                'created_at' => Carbon::now(),  //użycie biblioteki do obsługi czasu
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'FPS',
                'created_at' => Carbon::now(),  //użycie biblioteki do obsługi czasu
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Adventure',
                'created_at' => Carbon::now(),  //użycie biblioteki do obsługi czasu
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Sim',
                'created_at' => Carbon::now(),  //użycie biblioteki do obsługi czasu
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Sport',
                'created_at' => Carbon::now(),  //użycie biblioteki do obsługi czasu
                'updated_at' => Carbon::now()
            ]
        ]);

    }
}
