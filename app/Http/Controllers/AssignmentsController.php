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
        // Shorthand
        // Option 1
        Assignment::create([
            'project_name' => request('projectNameInput'),
            'image_url' => request('imageUrlInput'),
            'description' => request('projectDescriptionTextArea')
        ]);

        // Option 2, will not work because of difference in naming request elements
        // Assignment::create(request(['project_name', 'image_url', 'description']));
        
        // option 3
        // $assignment = new Assignment();

        // $assignment->project_name = request('projectNameInput');
        // $assignment->image_url = request('imageUrlInput');
        // $assignment->description = request('projectDescriptionTextArea');
        // $assignment->save();

        return redirect('/assignments');

        //return request()->all();

    }

    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
        return view('assignments.edit', compact('assignment'));
    }

    public function update($id)
    {

        $assignment = Assignment::findOrFail($id);

        $assignment->project_name = request('projectNameInput');
        $assignment->image_url = request('imageUrlInput');
        $assignment->description = request('projectDescriptionTextArea');
        
        $assignment->save();

        return redirect('/assignments');

    }

    // route model binding 
    //    public function show($id)
    public function show(Assignment $assignment)
    {
        // $assignment = Assignment::findOrFail($id);
        
        return view('assignments.show', compact('assignment'));

    } 

    public function destroy($id)
    {
        Assignment::findOrFail($id)->delete();
        return redirect('/assignments');

    }

}
