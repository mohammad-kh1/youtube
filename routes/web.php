<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name("home");
Route::get('/delete-video', function () {
    return Inertia::render('DeleteVideo');
})->name("deleteVideo");
Route::get("/videos/{id}" , [VideoController::class , "show"])->name("video.show");

require __DIR__ . '/auth.php';
