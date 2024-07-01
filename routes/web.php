<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/menu', function () {
    return view('pages.menu');
})->name('menu');

Route::get('/mentionslegales', function () {
    return view('pages.mentionslegales');
})->name('mentionslegales');

Route::get('/conditionsgeneralesdevente', function () {
    return view('pages.conditionsvente');
})->name('cgv');

Route::get('/confidentialite', function () {
    return view('pages.confidentialite');
})->name('confidentialite');

Route::get('/plandusite', function () {
    return view('pages.plandusite');
})->name('plandusite');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
