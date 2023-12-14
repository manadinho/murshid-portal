<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProjectController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile',   [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/create-project', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/create-project', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/edit-project/{id}', [ProjectController::class, 'edit'])->name('projects.edit');
Route::post('/update-project/{id}', [ProjectController::class, 'update'])->name('projects.update');
Route::get('/delete-project/{id}', [ProjectController::class, 'destroy'])->name('projects.delete');




require __DIR__.'/auth.php';
