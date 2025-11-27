<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;

Route::get("/", [GeneralController::class, "home"])->name("home");
Route::get("/about", [GeneralController::class, "about"])->name("about");


Route::get("/category/{slug}", [CategoryController::class, "show"])->name("show-category");
Route::get("/event/{slug}", [EventController::class, "show"])->name("show-event");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

