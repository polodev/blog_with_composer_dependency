<?php
require 'vendor/autoload.php';
require 'create-table.php';

use Faker\Factory;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Capsule\Manager;

$faker = Factory::create();


//seeding user data
foreach(range(1, 5) as $i) {
  User::insert([
    "name" => 'polo' . $i,
    "email" => "polo-{$i}@gmail.com",
    "password" => password_hash('secret', PASSWORD_BCRYPT),
    "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
    "updated_at" => Carbon::now()->format('Y-m-d H:i:s'),
  ]);
} 


// seeding post data

foreach(range(1, 50) as $i) {
  Post::insert([
    'title' => $faker->sentence,
    'content' => $faker->paragraph(50),
    'user_id' => rand(1, 5)
  ]);
}

//sedding category 
//
$categories = [
  'Web',
  'Technology',
  'PHP',
  'Mysql',
  'Html',
  'Css',
  'React js',
  'Vue js',
  'Angular js',
  'Jquery'
];
foreach(range(1, 50) as $i) {
  Category::insert([
    'name' => $categories[rand(0, (count($categories) - 1))],
    'post_id' => $i,
    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
  ]);
}









