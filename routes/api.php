<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ApodController;

Route::get('/blogs', [BlogController::class, 'getPublishedData']);
Route::post('/blogs', [BlogController::class, 'registerBlog']);
Route::get('/apod', [ApodController::class, 'getApod']);