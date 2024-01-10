<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'price' => $faker->numberBetween(10, 9000),
        'manage_stock' => false,
        'in_stock' => $faker->boolean(),
        'sku' => $faker->word(),
        'published' => $faker->boolean(),
    ];
});
