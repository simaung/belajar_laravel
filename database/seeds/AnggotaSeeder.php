<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        foreach(range(1,15) as $i){
            DB::table('anggota')->insert([
                'nama' => $faker->name,
            ]);
        }

    }
}
