<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\NenoLaWeekController;


Route::get('login', function () {
    return view('login');
});

Route::get('signup', function () {
    return view('signup');
});
Route::get('jumapili', function () {
    return view('jumapili');
});
Route::get('about', function () {
    return view('about');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('/view_events', [RegistrationController::class, 'getEvents'])->name('view_events');
Route::get('/leaders', [RegistrationController::class, 'getAllMembers'])->name('leaders');
Route::get('/', [NenoLaWeekController::class, 'week'])->name('index');
Route::get('ibada', [NenoLaWeekController::class, 'getPictures'])->name('ibada');
// Route for storing user registration
Route::post('/register', [RegistrationController::class, 'store'])->name('register');

Route::post('/login', [AuthenticationController::class, 'login'])->name('login');

Route::get('/signup', [RegistrationController::class, 'redirectToSignup'])->name('signup');

Route::middleware('auth.token')->group(function () {
Route::post('/store-program-name', [RegistrationController::class, 'storeProgramName'])->name('store-program-name');
Route::get('/wahumini', [RegistrationController::class, 'getAllUsers'])->name('wahumini');

Route::post('/members', [RegistrationController::class, 'storeM'])->name('members.store');
Route::get('/sites/leader/dashboard', function () {
    return view('sites.leader.dashboard');
});
Route::get('/sites/member/dashboard', function () {
    return view('sites.member.dashboard');
});
Route::get('neno', function () {
    return view('neno');
});
Route::get('post_neno', function () {
    return view('post_neno');
});

Route::get('events', [RegistrationController::class, 'createEvent'])->name('events');
Route::post('/events', [RegistrationController::class, 'storeEvent'])->name('events.store');

Route::get('/sites/leader/kozi', function () {
    return view('sites.leader.kozi');
});

Route::get('management', function () {
    return view('management');
});


Route::post('/store-post', [NenoLaWeekController::class, 'storeIbada'])->name('store.post');
Route::get('manage_neno', [NenoLaWeekController::class, 'manage'])->name('manage_neno');

Route::get('/edit/{id}', [NenoLaWeekController::class, 'edit'])->name('editNeno');
Route::delete('/delete/{id}',[NenoLaWeekController::class, 'delete'])->name('deleteNeno');

Route::put('/update/{id}', [NenoLaWeekController::class, 'update'])->name('updateNeno');

Route::post('/store-neno-la-week', [NenoLaWeekController::class, 'store'])->name('store.neno_la_week');


Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

});


