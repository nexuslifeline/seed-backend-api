<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // org users
        foreach (range(1, 50) as $index) {
            $userId = DB::table('users')->insertGetId([
                'uuid' => Str::uuid(),
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('123456'), // You may customize the password
            ]);

            DB::table('admins')->insertGetId([
                'uuid' => Str::uuid(),
                'name' => $faker->name,
                'phone_no' => $faker->phoneNumber,
                'mobile_no' => $faker->phoneNumber,
                'address' => $faker->address,
                'user_id' => $userId
            ]);
        }
    }
}
