<?php

namespace App\Controllers;

use \Core\View;
use \Core\Controller;

/**
 * Home controller
 */
class HomeController extends Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        View::renderTemplate('Dashboard/index.html');
    }
}
