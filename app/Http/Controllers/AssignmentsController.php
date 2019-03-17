<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Assignment;

class AssignmentsController extends Controller
{
    public function index()
    {
        $assignments = \App\Assignment::all();

        // return $courses;

        return view('assignments.index', compact('assignments'));
    }

    public function create()
    {
        return view('assignments.create');
    }

    public function store()
    {
        $assignment = new Assignment();

        $assignment->project_name = request('projectNameInput');
        $assignment->image_url = request('imageUrlInput');
        $assignment->description = request('projectDescriptionTextArea');
        $assignment->save();

        return redirect('/assignments');

        //return request()->all();

    }

    public function edit($id)
    {
        $assignment = Assignment::find($id);
        return view('assignments.edit', compact('assignment'));
    }

    public function update($id)
    {

        $assignment = Assignment::find($id);

        $assignment->project_name = request('projectNameInput');
        $assignment->image_url = request('imageUrlInput');
        $assignment->description = request('projectDescriptionTextArea');
        
        $assignment->save();

        return redirect('/assignments');

    }

    public function show($id)
    {
        $assignment = Assignment::find($id);
        
        return view('assignments.show', compact('assignment'));

    } 

    public function destroy()
    {

    }

}
