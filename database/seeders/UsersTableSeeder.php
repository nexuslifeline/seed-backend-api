<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // org users
        foreach (range(1, 50) as $index) {
            $user = DB::table('users')->insertGetId([
                'uuid' => Str::uuid(),
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('123456'), // You may customize the password
            ]);

            // Attach the user to one or more organizations
            $organizationIds = DB::table('organizations')->pluck('id')->random(rand(1, 3))->toArray();

            foreach ($organizationIds as $organizationId) {
                $roleId = DB::table('roles')
                    ->where('organization_id', $organizationId)
                    ->inRandomOrder()
                    ->pluck('id')
                    ->first();
                DB::table('organization_user')->insert([
                    'user_id' => $user,
                    'organization_id' => $organizationId,
                    'role_id' => $roleId,
                ]);
            }
        }

        // admin users
        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'uuid' => Str::uuid(),
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('123456'), // You may customize the password
            ]);
        }
    }
}
