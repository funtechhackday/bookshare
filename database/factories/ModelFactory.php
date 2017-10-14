<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Bookshare\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Bookshare\Models\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(15),
        'desc' => $faker->text(200),
        'image' => $faker->imageUrl(),
    ];
});

$factory->define(Bookshare\Models\Author::class, function (Faker\Generator $faker) {
    return [
        'firstName' => $faker->firstName,
        'middleName' => $faker->firstName,
        'lastName' => $faker->lastName
    ];
});

$factory->define(Bookshare\Models\Order::class, function (Faker\Generator $faker) {
    return [
        'comment' => $faker->text(),
        'returnDate' => $faker->dateTime()
    ];
});

$factory->define(Bookshare\Models\Genre::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(15)
    ];
});

$factory->define(Bookshare\Models\BookRate::class, function (Faker\Generator $faker) {
    return [
        'rate' => $faker->randomElement([1,2,3,4,5])
    ];
});
