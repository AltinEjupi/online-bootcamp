<?php

namespace App\Controllers;
use App\Helper\Session;
use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use \Core\View;
use \Core\Controller;

/**
 * Home controller
 */
class EnrollmentController extends Controller
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
        $enrollments = Enrollment::orderBy('id')->with('student')->with('course')->get();

        View::renderTemplate('Enrollment/index.html', ['enrollments' => $enrollments]);
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();

        View::renderTemplate('Enrollment/create.html', ['students'=> $students,'courses'=> $courses]);
    }

    public function store()
    {
        $enrollment = new Enrollment();
        $enrollment->student_id = $_POST['student_id'];
        $enrollment->course_id = $_POST['course_id'];
        $enrollment->save();
        header('Location: /enrollments');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $enrollment = Enrollment::findOrFail($id);

        View::renderTemplate('Enrollment/edit.html', ['enrollment'=>$enrollment]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->student_id = $_POST['student_id'];
        $enrollment->course_id = $_POST['course_id'];
        $enrollment->update();

        header('Location: /enrollments');
    }

    public function destroy()
    {
        $id = $_POST['id'];
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        header('Location: /enrollments');
    }
}
