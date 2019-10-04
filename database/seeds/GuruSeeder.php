<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        
        for($i = 1; $i <= 20; $i++){
            // insert data ke tabel guru menggunakan Faker
            DB::table('guru')->insert([
                'nama'      => $faker->name,
                'umur'      => $faker->numberBetween(25,40)
            ]);
        }
    }
}
