<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $unitId = DB::table('units')
                    ->inRandomOrder()
                    ->pluck('id')
                    ->first();

            $categoryId = DB::table('categories')
                    ->inRandomOrder()
                    ->pluck('id')
                    ->first();


            DB::table('products')->insert([
                'name' => $faker->productName,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 100),
                'unit_id' => $unitId,
                'category_id' => $categoryId,
                // Add any other relevant product fields
            ]);
        }
    }
}
