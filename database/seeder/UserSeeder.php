<?php

namespace Database\Seeder;

use Maharlika\Database\Factory\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $roles = ['user', 'admin'];

        for ($i = 0; $i < 50; $i++) {
            $role = $faker->randomElement($roles);
            $verified = $faker->boolean(70);

            $userData = [
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => bcrypt('password'),
                'role' => $role,
                'email_verified_at' => $verified ? now() : null,
            ];

            $user = new User();
            $user->forceFill($userData)->save();
        }
    }
}
