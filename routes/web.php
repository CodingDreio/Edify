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
Route::GET('/tutor_profile/{id}',[TutorController::class,'viewTutorProfile'])->name('viewTutorProfile');
Route::POST('/apply_subject',[TutorController::class,'applySubject'])->name('applySubject');
Route::POST('/cancel_subject',[TutorController::class,'cancelSubject'])->name('cancelSubject');
Route::POST('/complete_subject',[TutorController::class,'completeSubject'])->name('completeSubject');


// Tutee Routes
Route::resource('/tutee', TuteeController::class);
Route::get('/tutees_timetable', [TuteeController::class,'myTuteesTimetable'])->name('myTuteesTimetable');
Route::get('/tutee_class/{id}', [TuteeController::class,'viewTuteeClass'])->name('viewTuteeClass');
Route::post('/tutee_accept', [TuteeController::class,'acceptTutee'])->name('acceptTutee');
Route::get('/tutee_decline/{id}', [TuteeController::class,'declineTutee'])->name('declineTutee');
    
    // >>> Forms
Route::get('/add_activity/{tutorID}/{takenID}', [TuteeController::class,'addActivity'])->name('addActivity');
Route::get('/upload_material/{tutorID}/{takenID}', [TuteeController::class,'uploadMaterial'])->name('uploadMaterial');
Route::get('/set_meeting/{tutorID}/{takenID}', [TuteeController::class,'setMeeting'])->name('setMeeting');

    // >>> Store
Route::get('/store_activity/{tutorID}/{takenID}', [TuteeController::class,'storeActivity'])->name('storeActivity');
Route::get('/store_material/{tutorID}/{takenID}', [TuteeController::class,'storeMaterial'])->name('storeMaterial');
Route::get('/store_meeting/{tutorID}/{takenID}', [TuteeController::class,'storeMeeting'])->name('storeMeeting');
