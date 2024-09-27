<?php

namespace App\Controllers;

use App\Helper\Session;
use App\Models\User;
use \Core\View;
use \Core\Controller;

class AuthenticatorController extends Controller
{
    public function loginForm()
    {
        $session = Session::getInstance();
        $message = '';
        if (!empty($session->message)) {
            $message = $session->message;
        }
        if (isset($_SESSION['userId'])) {
            header('Location:/users ');
        }

        View::renderTemplate('Users/login.html', ['message' => $message]);
    }

    public function store()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = User::where('email', $email)->where('password', $password)->latest()->first();
        $session = Session::getInstance();

        if ($user) {
            $session->login($user);
            header('Location: /users');
            exit;
        }
        $session->message = 'Your Email or password in incorrect';
        header('Location: /login');
        exit;
    }
    public function logout()
    {
        $session = Session::getInstance();
        if (!$session->isSignedIn()) {
            header('Location: /login');
        }
        $session = Session::getInstance();
        $session->logout();
        header('Location: /login');
    }

}