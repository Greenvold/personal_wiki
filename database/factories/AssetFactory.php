<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Asset as AppAsset;
use App\Model;
use App\User;
use Faker\Generator as Faker;

$factory->define(AppAsset::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence(1),
        'short_description' => $faker->sentence(5),
        'short_description' => $faker->realText(250),
        'content' => $faker->realText(2500),
        'published_at' => date('d/m/Y', strtotime($faker->date())),
        'image' => $faker->randomElement(['guides/bootstrap.png', 'guides/angular.png', 'guides/vue.png', 'guides/c.jpg', 'guides/excel.png']),
        'user_id' => factory(User::class)->create()->id
    ];
});