<?php

namespace App\Controllers;
use App\Models\Professor;
use App\Helper\Session;
use App\Models\Course;
use \Core\View;
use \Core\Controller;

/**
 * Home controller
 */
class ProfessorController extends Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
        $professors = Professor::orderBy('id','desc')->with('courses')->get();

        View::renderTemplate('Professors/index.html', ['professors' => $professors]);
    }

    public function create()
    {
        $courses = Course::all();
        View::renderTemplate('Professors/create.html', ['courses'=> $courses]);
    }

    public function store()
    {
        $professor = new Professor();
        $professor->first_name = $_POST['first_name'];
        $professor->last_name = $_POST['last_name'];
        $professor->email = $_POST['email'];
        $professor->profession = $_POST['profession'];
        $professor->address = $_POST['address'];
        $professor->phone = $_POST['phone'];
        $professor->course_id = $_POST['course_id'];
        $professor->save();

        header('Location: /professors');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $professor = Professor::findOrFail($id);

        View::renderTemplate('Professors/edit.html', ['professor'=>$professor]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $professor = Professor::findOrFail($id);
        $professor->first_name = $_POST['first_name'];
        $professor->last_name = $_POST['last_name'];
        $professor->email = $_POST['email'];
        $professor->profession = $_POST['profession'];
        $professor->address = $_POST['address'];
        $professor->phone = $_POST['phone'];
        $professor->course_id = $_POST['course_id'];
        $professor->update();

        header('Location: /professors');
    }

    public function destroy()
    {
        $id = $_POST['id'];
        $professor = Professor::findOrFail($id);
        $professor->delete();

        header('Location: /professors');
    }
}
