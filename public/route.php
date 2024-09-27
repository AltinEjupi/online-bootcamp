<?php

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'HomeController', 'action' => 'index']);

$router->add('users', ['controller' => 'UserController', 'action' => 'index']);
$router->add('users-create', ['controller' => 'UserController', 'action' => 'create']);
$router->add('users-store', ['controller' => 'UserController', 'action' => 'store']);
$router->add('users-edit', ['controller' => 'UserController', 'action' => 'edit']);
$router->add('users-update', ['controller' => 'UserController', 'action' => 'update']);
$router->add('users-delete', ['controller' => 'UserController', 'action' => 'destroy']);

$router->add('courses', ['controller' => 'CourseController', 'action' => 'index']);
$router->add('courses-create', ['controller' => 'CourseController', 'action' => 'create']);
$router->add('courses-store', ['controller' => 'CourseController', 'action' => 'store']);
$router->add('courses-edit', ['controller' => 'CourseController', 'action' => 'edit']);
$router->add('courses-update', ['controller' => 'CourseController', 'action' => 'update']);
$router->add('courses-delete', ['controller' => 'CourseController', 'action' => 'destroy']);

$router->add('professors', ['controller' => 'ProfessorController', 'action' => 'index']);
$router->add('professors-create', ['controller' => 'ProfessorController', 'action' => 'create']);
$router->add('professors-store', ['controller' => 'ProfessorController', 'action' => 'store']);
$router->add('professors-edit', ['controller' => 'ProfessorController', 'action' => 'edit']);
$router->add('professors-update', ['controller' => 'ProfessorController', 'action' => 'update']);
$router->add('professors-delete', ['controller' => 'ProfessorController', 'action' => 'destroy']);

$router->add('students', ['controller' => 'StudentController', 'action' => 'index']);
$router->add('students-create', ['controller' => 'StudentController', 'action' => 'create']);
$router->add('students-store', ['controller' => 'StudentController', 'action' => 'store']);
$router->add('students-edit', ['controller' => 'StudentController', 'action' => 'edit']);
$router->add('students-update', ['controller' => 'StudentController', 'action' => 'update']);
$router->add('students-delete', ['controller' => 'StudentController', 'action' => 'destroy']);

$router->add('enrollments', ['controller' => 'EnrollmentController', 'action' => 'index']);
$router->add('enrollments-create', ['controller' => 'EnrollmentController', 'action' => 'create']);
$router->add('enrollments-store', ['controller' => 'EnrollmentController', 'action' => 'store']);
$router->add('enrollments-edit', ['controller' => 'EnrollmentController', 'action' => 'edit']);
$router->add('enrollments-update', ['controller' => 'EnrollmentController', 'action' => 'update']);
$router->add('enrollments-delete', ['controller' => 'EnrollmentController', 'action' => 'destroy']);

$router->add('login', ['controller' => 'AuthenticatorController', 'action' => 'loginForm']);
$router->add('login-store', ['controller' => 'AuthenticatorController', 'action' => 'store']);
$router->add('logout', ['controller' => 'AuthenticatorController', 'action' => 'logout']);



$router->dispatch($_SERVER['QUERY_STRING']);


