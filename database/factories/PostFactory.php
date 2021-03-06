<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence("5");
    return [
        "title" => $title,
        "slug"  => \Illuminate\Support\Str::slug($title),
        "content"  => $faker->text,
        "category_id" => factory(\App\Category::class)->create()->id,
        "user_id" => factory(\App\User::class)->create()->id,
        "online" => true,
        "cover_path" => asset("storage/covers/cover.jpg"),
        "visits" => 0
    ];
});
