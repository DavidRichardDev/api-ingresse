<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'mail'=> 'nome@gmail.com',
        'celphone' => '(99) 99999-9999',
        'age' => $faker->randomNumber(2)
    ];
});
