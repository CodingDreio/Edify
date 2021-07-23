<?php

use Illuminate\Support\Facades\Route;

//Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\TuteeController;
use App\Http\Controllers\HomeController;
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


// // Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/notifications',[HomeController::class,'notification'])->name('notification');
Route::post('/accept_reschedule/{notifID}/{activityID}',[HomeController::class,'acceptReschedule'])->name('acceptReschedule');
Route::get('/reject_reschedule/{notifID}/{activityID}',[HomeController::class,'rejectReschedule'])->name('rejectReschedule');
Route::get('/remove_notification/{notifID}',[HomeController::class,'removeNotif'])->name('removeNotif');


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
Route::get('/my_class/{subID}/{tutorID}/{tuteeID}/{page}', [TutorController::class,'tutorClass'])->name('tutorClass');
Route::get('/my_tutors', [TutorController::class,'usersTutor'])->name('usersTutor');
Route::get('/search_result', [TutorController::class,'search'])->name('search');
Route::GET('/tutor_profile/{id}',[TutorController::class,'viewTutorProfile'])->name('viewTutorProfile');
Route::POST('/apply_subject',[TutorController::class,'applySubject'])->name('applySubject');
Route::POST('/cancel_subject',[TutorController::class,'cancelSubject'])->name('cancelSubject');
Route::POST('/complete_subject',[TutorController::class,'completeSubject'])->name('completeSubject');
Route::get('/add_submition/{id}/{page}',[TutorController::class,'addSubmition'])->name('addSubmition');
Route::post('/store_submission/{id}/{page}/{takenID}',[TutorController::class,'storeSubmission'])->name('storeSubmission');
Route::get('/view_meeting/{id}/{page}',[TutorController::class,'viewMeeting'])->name('viewMeeting');
Route::post('/request_resched/{id}/{page}',[TutorController::class,'requestResched'])->name('requestResched');


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
    Route::post('/store_activity/{tutorID}/{takenID}', [TuteeController::class,'storeActivity'])->name('storeActivity');
    Route::post('/store_material/{tutorID}/{takenID}', [TuteeController::class,'storeMaterial'])->name('storeMaterial');
    Route::post('/store_meeting/{tutorID}/{takenID}', [TuteeController::class,'storeMeeting'])->name('storeMeeting');

    Route::get('/download_file/{file}',[TutorController::class,'downloadFile'])->name('downloadFile');
    Route::get('/download_submission/{file}',[TuteeController::class,'downloadSubmission'])->name('downloadSubmission');



Route::get('/view_submission/{submissionID}/{page}/{classID}',[TuteeController::class,'viewSubmission'])->name('viewSubmission');
Route::get('/update_score/{submissionID}/{classID}',[TuteeController::class,'updateScore'])->name('updateScore');