<?php

use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\ProfileController;
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

// // Edit Profile Page
// Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('editProfile');
Route::resource('/profile', ProfileController::class);