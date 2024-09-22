<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->boolean;

        return [
            'name'              => fake()->firstName($gender),
            'family'            => fake()->lastName(),
            'email'             => fake()->unique()->safeEmail(),
            'phone'             => fake()->regexify('/^(09)[0-9]{9}$/'),
            'username'          => fake()->unique()->userName(),
            'password'          => 'password',
            'gender'            => $gender,
            'birthdate'         => fake()->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            'email_verified_at' => now(),
            'phone_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
