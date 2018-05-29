<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->word,
        'body'=>$faker->paragraph,
        'is_published'=>$faker->numberBetween(0,1),
        'user_id'=>function(){
            return User::all()->random();
        },

    ];
});
