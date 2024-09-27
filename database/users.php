<?php

require "../vendor/autoload.php";
require "../Bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->create('users',function($table){
    $table->id();
    $table->string('username',30);
    $table->string('email')->unique();
    $table->string('password');
    $table->string('city',30)->nullable();
    $table->string('address')->nullable();
    $table->text('phone')->nullable();
    $table->boolean('status')->default(1);
    $table->timestamps();
    
});