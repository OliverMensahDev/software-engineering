<?php
require_once __DIR__ . '/vendor/autoload.php';
// Use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();
// Generate fake name
echo $faker->name;
// Generate fake address
echo $faker->address;
// Generate fake text
echo $faker->text;