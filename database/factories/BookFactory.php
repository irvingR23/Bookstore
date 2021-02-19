<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;
use \Illuminate\Support\Str;

$factory->define(Book::class, function (Faker $faker) {
  $title = $faker->sentence(4);
  return [
    'user_id' => rand(1, 10),
    'category_id' => rand(1, 20),
    'name' => $title,
    'description' => $faker->text(800),
    'slug' => Str::slug($title),
    'ISBN' => $faker->isbn10,
    'author' => $faker->name,
    'editorial' => $faker->sentence(2),
    'status' => $faker->randomElement(['stock','vacio'])
  ];
});
