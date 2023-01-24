<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'ARAVIND K',
            'pen' => '900842',
            'password' => '$2y$10$hHXBtAKWEOl.h712EYdXrOs1l.S9Z6n0qwj7QeUl.yRTx64JNTrK2',
            'mother_unit' => 'CITY POLICE OFFICE, KOLLAM',
            'role' => '1',
            'applied' => '1'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
