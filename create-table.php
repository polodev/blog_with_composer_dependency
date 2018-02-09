<?php 
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager;

Manager::schema()->dropIfExists('categories');
Manager::schema()->dropIfExists('posts');
Manager::schema()->dropIfExists('users');


Manager::schema()->create('users', function ($t) {
  $t->increments('id');
  $t->string('name');
  $t->string('email')->unique();
  $t->string('password');
  $t->timestamps();
});

Manager::schema()->create('posts', function ($t) {
  $t->increments('id');
  $t->string('title');
  $t->text('content');
  $t->integer('user_id')->unsigned();
  $t->timestamps();
  $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
});

Manager::schema()->create('categories', function ($t) {
  $t->increments('id');
  $t->string('name');
  $t->integer('post_id')->unsigned();
  $t->timestamps();
  $t->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
});

