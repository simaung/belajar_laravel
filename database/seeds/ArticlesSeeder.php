<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $faker->addProvider(new BlogArticleFaker\FakerProvider($faker));

        foreach(range(0,10) as $i){
            DB::table('articles')->insert([
                'judul' => $faker->articleTitle,
            ]);
        }
    }
}
