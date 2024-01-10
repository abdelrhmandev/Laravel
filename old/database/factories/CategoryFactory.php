<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\CategoryTranslation;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'image'  => 'uploads/categories/it.jpg','status'=>'1','taxonomy'=>'posts',
    ];
});


$factory->define(CategoryTranslation::class, function (Faker $faker) {
    return [
        'title'        => $faker->sentence,
        'slug'          =>$faker->sentence,
        'description'   =>$faker->paragraph(30),
        'lang'          =>'en',
        'category_id'   =>function(){
            return factory(Category)->create()->id;
        },
    ];
});