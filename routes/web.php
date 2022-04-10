<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::controller(PageController::class)->middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/extract', 'extract')->name('extract');
    Route::get('/extract/sendMail', 'sendEmail')->name('sendMail');
});

Route::controller(PageController::class)->group(function(){
    Route::get('/', 'index')->name('index');
});

Route::controller(SendEmailController::class)->middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::post('/extract/sendMail/storeEmail', 'storeEmail')->name('store.email');
    Route::post('/extract/sendMail/fetchEmail', 'fetchEmail')->name('fetch.email');
    Route::post('/sendEmail', 'sendEmail')->name('send.mail');

    // delete

    Route::post('/extract/sendMail/removeEmail', 'removeEmail')->name('remove.email');
    Route::post('/extract/sendMail/uploadindfiles', 'uploadFiles')->name('upload.files');
});