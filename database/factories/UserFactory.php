<?php

namespace Database\Factory;

use Maharlika\Database\Factory\Factory;
use Maharlika\Support\Carbon;

/**
 * @extends Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'role' => 'user',
            'email_verified_at' => null,
        ];
    }

    /**
     * Indicate that the user is an admin.
     */
    public function admin(): static
    {
        return $this->state(function () {
            return [
                'role' => ['admin','user'],
            ];
        });
    }

    /**
     * Assign a specific role.
     */
    public function role(string $role): static
    {
        return $this->state([
            'role' => $role,
        ]);
    }

    /**
     * Indicate that the user is verified.
     */
    public function verified(): static
    {
        return $this->state([
            'email_verified_at' => Carbon::now(),
        ]);
    }

    /**
     * Indicate that the user is unverified.
     */
    public function unverified(): static
    {
        return $this->state([
            'email_verified_at' => null,
        ]);
    }

    /**
     * Set a specific email.
     */
    public function withEmail(string $email): static
    {
        return $this->state([
            'email' => $email,
        ]);
    }
}
