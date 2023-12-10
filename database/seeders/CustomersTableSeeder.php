<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('customers')->insert([
                'name' => $faker->name,
                'uuid' => Str::uuid(),
                'phone_no' => $faker->phoneNumber,
                'mobile_no' => $faker->phoneNumber,
                'address' => $faker->address,
                // Add any other relevant organization fields
            ]);
        }
    }
}
