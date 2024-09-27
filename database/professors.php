<?php

require "../vendor/autoload.php";
require "../Bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('professors', function ($table) {
    $table->id();
    $table->string('first_name',30);
    $table->string('last_name',30);
    $table->string('email',30);
    $table->string('profession',30);
    $table->string('address',50);
    $table->string('phone',30);
    $table->string('course_id');
});