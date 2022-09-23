<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create();
        return [
            'user_id' => $user->id,
            'faculty_id' => rand(1, 48),
            'email' => $user->email,
            'name' => $user->name,
            'avatar' => 1,
            'phone' => 1,
            'gender' => rand(0, 1),
            'birthday' => $this->faker->date,
            'address' => $this->faker->address,
            'code' => Str::uuid()->toString(),
        ];
    }
}
