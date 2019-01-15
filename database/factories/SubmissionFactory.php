<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Submission::class, function (Faker $faker) {
    return [
          "pr_url"         => $faker->url
        , "submission_url" => $faker->url
        , "latest_hash"    => str_random(20)
        , "grade"          => $faker->numberBetween(0, 100)
        , "assignment_id"  => $faker->randomDigitNotNull
    ];
});
