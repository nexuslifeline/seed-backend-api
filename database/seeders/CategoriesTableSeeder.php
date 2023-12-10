<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 25) as $index) {
            DB::table('categories')->insert([
                'name' => ucfirst($faker->word),
                'description' => $faker->sentence,
                // Add any other relevant product category fields
            ]);
        }
    }
}
