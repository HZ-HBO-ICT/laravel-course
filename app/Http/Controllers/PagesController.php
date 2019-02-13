<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //home function
    public function home()
    {
        return view('index', [
            'name' => request('name', 'noob')
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function assignments()
    {
        return view('assignments');
    }

    public function dashboard()
    {
        $myResults = [
            [
                'course' => 'programming basics',
                'grade' => 8,
                'teacher' => 'Loek van der Linde'
            ],
            [
                'course' => 'object oriented programming',
                'grade' => 7,
                'teacher' => 'Rimmert Zelle'
            ]
        ];
        
        return view('dashboard', [
            'results' => $myResults
        ]);
        
        //equally right (the word after the with keyword is the variable which blade will use)
        //return view('dashboard')->withResults($myResults);
    }

}
