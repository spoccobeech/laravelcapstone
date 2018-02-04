<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\BufashItems::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user-id' => App\User::all()->random->id(),
        'item_name' => $faker->name,
        'item_type',
        'item_desc',
        'item_size',
        'item_qty',
        'item_stocks',
        'item_desc',
        'item_price',
        'item_image'

        /*
        $table->increments('id');
        $table->integer('user_id');
        $table->string('rowId')->unique();
        $table->string('item_name');
        $table->string('item_type');
        $table->string('item_size');
        $table->string('item_qty');
        $table->string('item_stocks');
        $table->string('item_desc');
        $table->string('item_price');
        $table->string('item_image');
        $table->rememberToken();
        $table->timestamps();
        */
    ];
});
