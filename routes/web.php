<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;

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

/***************************************** AUTHENTICATION ROUTES ***********************************/

//Authentication Routes with Verification Enabled
Auth::routes(['verify' => true]);

/***************************************** VERIFICATION ROUTES *************************************/

//Gives link to verification notice
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

//Verification Redirection from link for email verification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/index');
})->middleware(['auth', 'signed'])->name('verification.verify');

//Verification link resend
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/******************************************** PAGE ROUTES *****************************************/

/******* Base Route To Index Page ********/
Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/index', function() {
    return view('index');
})->name('home');

/******* Related Links Page Route ********/
Route::get('/other', function () 
{
    return view('related');
});

/******* Functionality Routes ********/

Route::resource('posts','PostsController')->middleware('auth');
Route::resource('categories','CategoriesController');
Route::resource('users','UsersController')->middleware('auth');
Route::resource('flags','FlagsController')->middleware('auth');
Route::resource('events','EventsController')->middleware('auth');
Route::resource('eventuser','EventUserController')->middleware('auth');
Route::resource('comments','CommentsController')->middleware('auth');
Route::resource('likes','LikesController')->middleware('auth');
Route::resource('categoryuser','CategoryUserController')->middleware('auth');
Route::resource('replies','ReplyController')->middleware('auth');
//Route to specific user's dashboard based on their username. Calls the DashboardController
//User must be verified and logged in to access
// Route::get('/dashboard/{username}', [DashboardController::class, 'show'])
//             ->name('dashboard')
//             ->middleware(['auth', 'verified']);
Route::group(['prefix'=>'pdf'],function(){
    Route::get('event/{id}','GeneratePDFController@event');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('users/reset','UserReset@reset')->name('users.reset');
    Route::get('users/disable','UserDisable@disable')->name('users.disable');
    Voyager::routes();
});
