<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Disbursement;
use Faker\Generator as Faker;

$factory->define(Disbursement::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween($min = 10000, $max = 999999999),
        'bank_code' => "bri",
        'account_number' => $faker->numberBetween($min = 100000000, $max = 999999999),
        'remark' => Str::random(20),
        'status' => Disbursement::INIT,
    ];
});
