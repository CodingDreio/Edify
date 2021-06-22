<?php

use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\ProfileController;
use App\Htttp\Controllers\SubjectsController;
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

Route::get('/', function () {
    return redirect('/welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// // Routes

// // Edit Profile
Route::resource('/profile', ProfileController::class);

// Update Subjects
Route::resource('/subject', SubjectsController::class);
