<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = \App\Course::all();

        // return $courses;

        return view('courses.index', compact('courses'));
    }
}
