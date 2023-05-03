<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HadiahPenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10 ; $i++) {
            DB::table('hadiah_pengguna')->insert([
                'pengguna_id' => $faker->numberBetween(1,10),
                'hadiah_id' => $faker->numberBetween(1,10)
            ]);
        }
    }
}
