<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
//
//$factory->define(App\User::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//        'remember_token' => str_random(10),
//    ];
//});

#region Users

$factory->define( App\Models\User::class, function() {
    return [];
});

#endregion

#region Projects

$factory->define( App\Models\Project::class, function(Faker $generator) {
    return [
        'user_id' => 1,
        'title' => $generator->text(50)
    ];
});

#endregion

#region Tasks

$factory->define( App\Models\Task::class, function(Faker $generator) {
    return [
        'project_id' => rand(1,5),
        'title' => $generator->text(50)
    ];
});

#endregion

