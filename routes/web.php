<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthenticationController;
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
    return view('index');
});

Route::get('login', function () {
    return view('login');
});

Route::get('signup', function () {
    return view('signup');
});

Route::get('/sites/leader/dashboard', function () {
    return view('sites.leader.dashboard');
});
Route::get('/sites/member/dashboard', function () {
    return view('sites.member.dashboard');
});
Route::get('/sites/leader/kozi', function () {
    return view('sites.leader.kozi');
});

Route::get('/signup', [RegistrationController::class, 'redirectToSignup'])->name('signup');








Route::post('/store-program-name', [RegistrationController::class, 'storeProgramName'])->name('store-program-name');


// Route for storing user registration
Route::post('/register', [RegistrationController::class, 'store'])->name('register');
Route::get('/users', [RegistrationController::class, 'getAllUsers']);
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');

