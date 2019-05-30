<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Season::class, function (Faker $faker) {
    $title = $faker->unique()->word(5);
    return [
        'name' => $title,
        'slug' => str_slug($title),
    ];
});
