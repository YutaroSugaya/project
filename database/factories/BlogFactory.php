<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        //
        'productName' => $faker->country,
        'price' => $faker->randomDigit,
        'stock' => $faker->randomDigit,
        'company' => $faker->company,
        'content' => $faker->realText,
    ];
});
