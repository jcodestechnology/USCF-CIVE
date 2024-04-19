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
Route::get('matumizi', function () {
    return view('matumizi');
});
Route::get('reports', function () {
    return view('reports');
});

Route::get('mapato_mengineyo', function () {
    return view('mapato_mengineyo');
});

// In your routes file (e.g., web.php)
Route::post('/store-kamati-mapato', [SadakaController::class, 'mapato_mengineyo'])->name('store.kamati-mapato');

Route::post('/generate-report', [SadakaController::class, 'generateReport'])->name('generate.report');

Route::get('/users/download-pdf', [RegistrationController::class, 'downloadPDF'])->name('users.download_pdf');
Route::post('/expenses', [SadakaController::class, 'matumizi'])->name('expenses.store');
Route::get('associate', [RegistrationController::class, 'retrieveInactiveUsers'])->name('associate');
Route::get('/view_events', [RegistrationController::class, 'getEvents'])->name('view_events');
Route::get('/leaders', [RegistrationController::class, 'getAllMembers'])->name('leaders');
Route::get('/', [NenoLaWeekController::class, 'week'])->name('index');
Route::get('ibada', [NenoLaWeekController::class, 'getPictures'])->name('ibada');

Route::post('/contact', [NenoLaWeekController::class, 'contact_method'])->name('contact.method');

// Route for storing user registration
Route::post('/register', [RegistrationController::class, 'store'])->name('register');

Route::post('/login', [AuthenticationController::class, 'login'])->name('login');

Route::get('/signup', [RegistrationController::class, 'redirectToSignup'])->name('signup');

Route::middleware('auth.token')->group(function () {
Route::post('/store-program-name', [RegistrationController::class, 'storeProgramName'])->name('store-program-name');
Route::get('/wahumini', [RegistrationController::class, 'getAllUsers'])->name('wahumini');

Route::post('/members', [RegistrationController::class, 'storeM'])->name('members.store');
Route::get('leaderdashboard', function () {
    return view('leaderdashboard');
});
Route::get('muumini_dashboard', function () {
    return view('muumini_dashboard');
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
Route::get('my_profile', function () {
    return view('my_profile');
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
Route::get('profile', function () {
    return view('profile');
});

Route::post('/profile/update', [AuthenticationController::class, 'update'])->name('profile.update');
Route::post('/store-income', [SadakaController::class, 'mradi'])->name('store.income');
Route::get('view_matoleo_yote', [SadakaController::class, 'retrieveAllSadaka'])->name('view_matoleo_yote');
Route::post('/store-sadaka', [SadakaController::class, 'ahadiKapu'])->name('store.ahadiKapu');
Route::get('view_my_ahadi', [SadakaController::class, 'retrieveMyAhadi'])->name('view_my_ahadi');
Route::get('ahadi_jaza', [SadakaController::class, 'someControllerMethod'])->name('ahadi_jaza');
Route::get('view_ahadi_zote', [SadakaController::class, 'someControllerMethod2'])->name('view_ahadi_zote');
Route::post('/update-ahadi', [SadakaController::class, 'updateAhadi'])->name('update.ahadi');

Route::post('/ahadi/store', [SadakaController::class, 'storeSadaka'])->name('ahadi.store');
Route::get('/view_maoni', [NenoLaWeekController::class, 'index'])->name('view.maoni');
Route::delete('/delete-maoni/{id}', [NenoLaWeekController::class, 'destroy'])->name('delete.maoni');
// Route::get('events', [RegistrationController::class, 'createEvent'])->name('events');
Route::post('/events', [RegistrationController::class, 'storeEvent'])->name('events.store');

Route::get('kozi', function () {
    return view('kozi');
});
Route::get('events', function () {
    return view('events');
});

Route::get('management', function () {
    return view('management');
});
Route::get('almanaki', function () {
    return view('almanaki');
});

Route::get('post_matangazo', function () {
    return view('post_matangazo');
});
Route::get('mradi', function () {
    return view('mradi');
});
Route::get('matangazopage', function () {
    return view('matangazopage');
});





Route::put('/update/matangazo/{id}', [RegistrationController::class, 'update_matangazo'])->name('update.matangazo');

Route::get('manage_matangazo', [RegistrationController::class, 'view_matangazo_admin'])->name('manage_matangazo');
Route::get('news', [RegistrationController::class, 'view_matangazos'])->name('news');
Route::post('/post-news', [RegistrationController::class, 'store_matangazo'])->name('post.news');
Route::post('/store-almanaki', [RegistrationController::class, 'store_Almanaki'])->name('store.almanaki');
Route::get('manage_almanaki', [RegistrationController::class, 'index'])->name('manage_almanaki');
Route::get('almanaki_user', [RegistrationController::class, 'index2'])->name('almanaki_user');
Route::put('/update-almanaki/{id}', [RegistrationController::class, 'update'])->name('update.almanaki');


Route::get('associates', [RegistrationController::class, 'retrieveInactiveUsers'])->name('associates');
Route::get('create_family', [RegistrationController::class, 'getFamilies'])->name('create_family');
Route::get('/add-member', [RegistrationController::class, 'addMember'])->name('add.member');
Route::get('my_family', [RegistrationController::class, 'myFamily'])->name('my_family');

Route::get('/generate-families', [RegistrationController::class, 'generateFamilies'])->name('generate.families');

Route::get('/view-family/{family}', [RegistrationController::class, 'viewFamily'])->name('view_family');

Route::get('/download-families-pdf', [RegistrationController::class, 'downloadFamiliesPDF'])->name('download.families.pdf');


Route::post('/store-post', [NenoLaWeekController::class, 'storeIbada'])->name('store.post');
Route::get('manage_neno', [NenoLaWeekController::class, 'manage'])->name('manage_neno');
Route::post('/store-maoni', [NenoLaWeekController::class, 'storeMaoni'])->name('store.maoni');
Route::get('/edit/{id}', [NenoLaWeekController::class, 'edit'])->name('editNeno');
Route::delete('/delete/{id}',[NenoLaWeekController::class, 'delete'])->name('deleteNeno');

Route::put('/update/{id}', [NenoLaWeekController::class, 'update'])->name('updateNeno');

Route::post('/store-neno-la-week', [NenoLaWeekController::class, 'store'])->name('store.neno_la_week');
Route::patch('/change-password', [AuthenticationController::class, 'updatePassword'])->name('change.password');


Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

});


