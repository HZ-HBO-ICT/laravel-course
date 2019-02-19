<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignmentsController extends Controller
{
    public function index()
    {
        $assignments = \App\Assignment::all();

        // return $courses;

        return view('assignments.index', compact('assignments'));
    }
}
