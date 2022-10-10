<?php

namespace Database\Factories;

use App\Models\Faculty;
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
        $faculty = Faculty::factory()->create();
        $user->assignRole('student');
        return [
            'user_id' => $user->id,
            'email' => $user->email,
            'faculty_id' => $faculty->id,
            'name' => $user->name,
            'avatar' => 'images/users/student.png',
            'phone' => '0584677817',
            'gender' => rand(0, 1),
            'birthday' => $this->faker->date,
            'address' => $this->faker->address,
            'code' => Str::uuid()->toString(),
        ];
    }
}
