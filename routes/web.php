<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\NenoLaWeekController;
use App\Http\Controllers\SadakaController;

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
Route::get('maoni', function () {
    return view('maoni');
});
Route::get('post_neno', function () {
    return view('post_neno');
});


Route::post('/sadaka/store', [SadakaController::class, 'store'])->name('sadaka.store');

Route::get('sadaka', function () {
    return view('sadaka');
});

Route::get('ahadi_mhumini', function () {
    return view('ahadi_mhumini');
});
Route::get('ahadi_kapu', function () {
    return view('ahadi_kapu');
});
Route::get('view_matoleo_yote', [SadakaController::class, 'retrieveAllSadaka'])->name('view_matoleo_yote');
Route::post('/store-sadaka', [SadakaController::class, 'ahadiKapu'])->name('store.ahadiKapu');
Route::get('view_my_ahadi', [SadakaController::class, 'retrieveMyAhadi'])->name('view_my_ahadi');
Route::get('ahadi_jaza', [SadakaController::class, 'someControllerMethod'])->name('ahadi_jaza');
Route::get('view_ahadi_zote', [SadakaController::class, 'someControllerMethod2'])->name('view_ahadi_zote');
Route::post('/update-ahadi', [SadakaController::class, 'updateAhadi'])->name('update.ahadi');

Route::post('/ahadi/store', [SadakaController::class, 'storeSadaka'])->name('ahadi.store');
Route::get('/view_maoni', [NenoLaWeekController::class, 'index'])->name('view.maoni');
Route::delete('/delete-maoni/{id}', [NenoLaWeekController::class, 'destroy'])->name('delete.maoni');
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
Route::post('/store-maoni', [NenoLaWeekController::class, 'storeMaoni'])->name('store.maoni');
Route::get('/edit/{id}', [NenoLaWeekController::class, 'edit'])->name('editNeno');
Route::delete('/delete/{id}',[NenoLaWeekController::class, 'delete'])->name('deleteNeno');

Route::put('/update/{id}', [NenoLaWeekController::class, 'update'])->name('updateNeno');

Route::post('/store-neno-la-week', [NenoLaWeekController::class, 'store'])->name('store.neno_la_week');


Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

});


