<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class TagsSeeder extends Seeder
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

        foreach(range(0,20) as $i){
            DB::table('tags')->insert([
                'tag' => $faker->word,
                'article_id' => $faker->numberBetween(1,11)
            ]);
        }
    }
}
