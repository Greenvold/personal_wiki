<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guide;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Guide::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence(),
        'short_description' => $faker->realText(250),
        'content' => $faker->realText(2500),
        'published_at' => date('d/m/Y', strtotime($faker->date())),
        'image' => $faker->randomElement(['guides/bootstrap.png', 'guides/angular.png', 'guides/vue.png', 'guides/c.jpg', 'guides/excel.png']),
        'user_id' => $faker->randomElement(['1', '2', '3'])
    ];
});