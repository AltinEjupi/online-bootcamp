<?php

require "../vendor/autoload.php";
require "../Bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('enrollments', function ($table) {
    $table->id();
    $table->string('student_id');
    $table->string('course_id');
    $table->timestamps();
});