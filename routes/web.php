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

    Route::group(['prefix' => 'project', 'as' => 'projects.'], function(){
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::post('/create', [ProjectController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
        Route::post('/update', [ProjectController::class, 'update'])->name('update');
        Route::get('/delete', [ProjectController::class, 'destroy'])->name('delete');
        Route::get('/config/{id}', [ProjectController::class, 'config'])->name('config'); 
    });
});





require __DIR__.'/auth.php';
