<?php

use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\TuteeController;
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
// Route::get('/profile_settings',[ProfileController::class,'profileSettingsView'])->name('profile.settings');
// Route::put('/profile_settings/{id}',[ProfileController::class,'updateHomeDefaultView'])->name('settings.updateDefaultView');


// Update Subjects
Route::resource('/subject', SubjectsController::class);

Route::resource('/topic', TopicsController::class);
// Route::get('/addTopic/{id}',[TopicsController::class,'addTopic'])->name('topic.addTopic');

// Tutor
Route::resource('/tutor', TutorController::class);
Route::get('/my_subjects', [TutorController::class,'subjectsTutor'])->name('subjectsTutor');
Route::get('/my_tutors', [TutorController::class,'usersTutor'])->name('usersTutor');
Route::get('/search_result', [TutorController::class,'search'])->name('search');


// Tutor
Route::resource('/tutee', TuteeController::class);
