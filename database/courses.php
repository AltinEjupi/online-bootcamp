<?php

require "../vendor/autoload.php";
require "../Bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('courses', function ($table) {
    $table->id();
    $table->string('course_name');
    $table->integer('course_code');
    $table->string('description');
    $table->string('professor_id');
});