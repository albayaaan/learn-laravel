<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HadiahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hadiah = ['Kulkas','Lemari','Rumah','Mobil','Sepeda Motor','Tas','Laptop'];
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10 ; $i++) {
            DB::table('hadiahs')->insert([
                'hadiah' => $hadiah[rand(0,sizeof($hadiah)-1)]
            ]);
        }
    }
}
