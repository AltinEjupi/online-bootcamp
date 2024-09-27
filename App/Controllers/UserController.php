<?php

namespace App\Controllers;
use App\Models\User;
use App\Helper\Session;
use \Core\View;
use \Core\Controller;

/**
 * Home controller
 */
class UserController extends Controller
{   
    public function __construct()
    {
        $session = Session::getInstance();
        if(!$session->isSignedIn()){
            header('Location: /login');
        }
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        $users = User::orderBy('id')->get();

        View::renderTemplate('Users/index.html', ['users' => $users]);
    }

    public function create()
    {
        View::renderTemplate('Users/create.html');
    }

    public function store()
    {
        $user = new User();
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->city = $_POST['city'];
        $user->address = $_POST['address'];
        $user->phone = $_POST['phone'];
        $user->save();
        header('Location: /users');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $user = User::findOrFail($id);

        View::renderTemplate('Users/edit.html', ['user'=>$user]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $user = User::findOrFail($id);
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->city = $_POST['city'];
        $user->address = $_POST['address'];
        $user->phone = $_POST['phone'];
        $user->update();

        header('Location: /users');
    }

    public function destroy()
    {
        $id = $_POST['id'];
        $user = User::findOrFail($id);
        $user->delete();

        header('Location: /users');
    }
}
