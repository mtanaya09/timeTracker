<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//GROUP OF ROUTES OF THE USER CONTROLLER 
Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest'); //ROUTE FOR LOGIN
    Route::post('/login/process', 'process'); //ROUTE FOR PROCESSING USER"S LOGIN
    Route::get('/register', 'register'); //ROUTE FOR REGISTER USER
    Route::post('/logout', 'logout'); //LOGOUT ROUTE
    Route::post('/store', 'store'); //STORE USER'S DATA
});

//GROUP OF ROUTES OF THE STUDENT CONTROLLER 
Route::controller(StudentController::class)->group(function () {
    Route::get('/', 'index')->middleware('auth'); //MAIN ROUTE
    Route::get('/add/student', 'create'); //ADD RECORD ROUTE
    Route::post('/add/student', 'store'); //STORE RECORD ROUTE
    Route::get('/student/{id}', 'show'); //SHOW SINGLE DATA ROUTE
    Route::post('/student/{id}', 'update'); //UPDATE SINGLE DATA ROUTE
    Route::delete('/student/{id}', 'destroy'); //DELETE SINGLE DATA ROUTE
});

/*
SAMPLE ROUTES:
Route::get();
Route::post();
Route::put();
Route::patch();
Route::delete();
Route::option();

COMMON NAMING ROUTE:
index  - show all data or students
show - show single data or student
create - show a form to add new student/user
store - store a data 
edit - show a form to edit a data
update - update a data
destroy - delete a data
*/































// Route::match(['get', 'post'], '/', function(){
//     return "POST and GET is allowed";
// });

// Route::any('/', function(){
//     return view('welcome');
// });

// Route::view('/welcome', 'welcome');

// Route::redirect('/welcome', '/'); -> this will return to the get URL

//Route::permanentRedirect('/welcome', '/'); -> sample: http:// -> https://

// Route::get('/users', function(Request $request){ 
//     dd($request);
//     return "goods";
// });

// Route::get('/user/{id}/{group}', function($id,$group){
//     return response($id.'-'.$group, 500);
//                 // ->header('Content-Type', 'text/plain');

// });

// Route::get('/request-json', function(){
//     return response ()->json(['name' => 'Prescribe Digital', 'age' => '22']);
// });

// Route::get('/request-download', function(){
//     $path = public_path().'/sample.txt';
//     $name = 'sample.txt';
//     $headers = array(
//         'Content-type: application/text-plain',
//     );
//     return response()->download($path, $name, $headers);
// });


//default ROUTE
// Route::get('/', function(){
//     return view('welcome');
// });

// Route::get('/users', [UserController::class, 'index'])->name('login');

// Route::get('/users/{id}', [UserController::class, 'show']);

// //Route that will direct to the students
// Route::get('/student/{id}', [StudentController::class, 'show']);
