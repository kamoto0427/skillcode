<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/blogs', [BlogController::class, 'getPublishedData']);
Route::post('/blogs', [BlogController::class, 'registerBlog']);