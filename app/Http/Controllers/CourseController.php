<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id','desc')->paginate(10);
        
        return view('course.index', ['courses' => $courses]);
    }
    
    public function create()
    {
        return "Este es el crear de los cursos del curso";
    }

    public function store()
    {
        return "Este es el store de los cursos del curso";
    }

    public function show()
    {
        return "Este es el show de los cursos del curso";
    }

    public function edit()
    {
        return "Este es el edit de los cursos del curso";
    }

    public function update()
    {
        return "Este es el update de los cursos del curso";
    }   

    public function destroy()
    {
        return "Este es el destroy de los cursos del curso";
    }
}
