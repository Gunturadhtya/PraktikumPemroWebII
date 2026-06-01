<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExperienceController;

Route::get('/', HomeController::class)->name('home');
Route::get('/profile', ProfileController::class)->name('profile');
Route::get('/experience/{id}', [ExperienceController::class,'show'])->name('experience.show');
