<?php

use App\Http\Controllers\CdramaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('home', function () {
    return view('home');
})->name('home');

Route::get('/', function () {
    return view('about');
})->name('about');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');

Route::resource('cdramas', CdramaController::class);
Route::resource('genres', GenreController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/cdramas', [App\Http\Controllers\AdminCdramaController::class, 'index'])
        ->name('admin.cdramas.index');

    Route::post('/admin/cdramas/{cdrama}/toggle', [App\Http\Controllers\AdminCdramaController::class, 'togglePublic'])
        ->name('admin.cdramas.toggle');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
