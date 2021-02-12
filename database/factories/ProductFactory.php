<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'name' => $this->faker->name,
        'description' => Str::random(10),
        'image' => Str::random(6),
        'price' => 10,
        'category_id' => 1
    ];
});
