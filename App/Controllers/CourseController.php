<?php

namespace App\Controllers;
use App\Helper\Session;
use App\Models\Course;
use App\Models\Professor;
use \Core\View;
use \Core\Controller;

/**
 * Home controller
 */
class CourseController extends Controller
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
        $courses = Course::orderBy('id','desc')->with('professor')->get();

        View::renderTemplate('Courses/index.html', ['courses' => $courses]);
    }

    public function create()
    {
        $professors = Professor::all();
        View::renderTemplate('Courses/create.html', ['professors'=> $professors]);
    }

    public function store()
    {
        $course = new Course();
        $course->course_name = $_POST['course_name'];
        $course->course_code = $_POST['course_code'];
        $course->description = $_POST['description'];
        $course->professor_id = $_POST['professor_id'];
        $course->save();

        // Course::create($_POST);

        header('Location: /courses');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $course = Course::findOrFail($id);
        View::renderTemplate('Courses/edit.html', ['course'=>$course]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $course = Course::findOrFail($id);
        $course->course_name = $_POST['course_name'];
        $course->course_code = $_POST['course_code'];
        $course->description = $_POST['description'];
        $course->professor_id = $_POST['professor_id'];
        $course->update();

        header('Location: /courses');
    }

    public function destroy()
    {
        $id = $_POST['id'];
        $course = Course::findOrFail($id);
        $course->delete();
        
        header('Location: /courses');
    }
}
