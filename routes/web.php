<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@home');

// Route::get('/', function () {
//     return view('index', [
//         'name' => request('name')
//     ]);
// });

Route::get('/contact', 'PagesController@contact');

// Route::get('/contact', function () {
//     return view('contact');
// });

Route::get('/assignments', 'PagesController@assignments');

// Route::get('/assignments', function () {
//     return view('assignments');
// });

Route::get('/dashboard', 'PagesController@dashboard');

// Route::get('/dashboard', function () {
    
//     $myResults = [
//         [
//             'course' => 'programming basics',
//             'grade' => 8,
//             'teacher' => 'Loek van der Linde'
//         ],
//         [
//             'course' => 'object oriented programming',
//             'grade' => 7,
//             'teacher' => 'Rimmert Zelle'
//         ]
//     ];
    
//     return view('dashboard', [
//         'results' => $myResults
//     ]);
    
//     //equally right (the word after the with keyword is the variable which blade will use)
//     //return view('dashboard')->withResults($myResults);

// });

