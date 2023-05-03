<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PekerjaanSeeder extends Seeder
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
            DB::table('pekerjaans')->insert([
                'pekerjaan' => $faker->jobTitle(),
                'pengguna_id' => $faker->numberBetween(1,10),
            ]);
        }
    }
}
