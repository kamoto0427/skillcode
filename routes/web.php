<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('top');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/plan', [PlanController::class, 'get'])->name('plan.get');
Route::get('/plan/editOrDelete', [PlanController::class, 'editOrDeleteView'])->name('plan.editOrDelete');
Route::get('/plan/create', [PlanController::class, 'createView'])->name('plan.create');
Route::post('/plan/store', [PlanController::class, 'store'])->name('plan.store');
Route::get('/plan/{plan}', [PlanController::class, 'show'])->name('plan.show');
Route::get('/plan/edit/{plan}', [PlanController::class, 'editView'])->name('plan.edit');
Route::post('/plan/update', [PlanController::class, 'update'])->name('plan.update');
Route::delete('/plan/delete/{plan_id}', [PlanController::class, 'delete'])->name('plan.delete');

Route::get('plan/tag/{tag_id}', [PlanController::class, 'getPlanByTag'])->name('planTag.get');

require __DIR__.'/auth.php';
