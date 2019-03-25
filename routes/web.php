<?php

use App\Http\Controllers\PostsController;

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

// Route::resource('/assignments', AssignmentsController); //all in one
Route::get('/assignments', 'AssignmentsController@index');
Route::get('/assignments/create', 'AssignmentsController@create');
Route::get('/assignments/{assignment}', 'AssignmentsController@show');
Route::post('/assignments', 'AssignmentsController@store');
Route::get('/assignments/{assignment}/edit', 'AssignmentsController@edit');
Route::patch('/assignments/{assignment}', 'AssignmentsController@update');
Route::delete('assignments/{assignment}', 'AssignmentsController@destroy');

Route::resource('/posts', 'PostsController'); //all in one


// Route::get('/assignments', function () {
//     return view('assignments');
// });

Route::get('/dashboard', 'PagesController@dashboard');


Route::get('/courses', 'CoursesController@index');

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

