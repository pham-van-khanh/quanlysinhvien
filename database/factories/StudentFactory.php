<?php

namespace Database\Factories;


use App\Models\Student;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => '$2a$12$71lR.o9aMev3pbWC9FzYKO.ZTH2.hbGoEca8z3eeyvPqEdBKrYer.',
        ];
    });

    $factory->define(Student::class, function (Faker $faker) {
        return [
            'user_id' => function () {
                return factory('App\Models\User')->create()->id;
            },
            'faculty_id' => function () {
                return factory('App\Models\Faculty')->create()->id;
            },
            'email' => function () {
                return factory('App\Models\User')->create()->email;
            },
            'gender' => rand(0, 1),
            'birthday' => $faker->date,
            'avatar' => $faker->imageUrl(100, 100),
            'address' => $faker->address,
            'code' => Str::uuid()->toString(),

        ];
    });

