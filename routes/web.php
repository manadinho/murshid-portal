<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectConfigController;


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
Route::group(['prefix' => 'google', 'as' => 'google.'], function(){
    Route::get('/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('redirect');
    Route::get('/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('callback');
});
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function(){
        Route::get('/',   [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/',[ProfileController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'project', 'as' => 'projects.'], function(){
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::post('/create', [ProjectController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
        Route::post('/update', [ProjectController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ProjectController::class, 'destroy'])->name('delete');

        Route::group(['prefix' => 'config', 'as' => 'config.'], function(){
            Route::get('/{id}', [ProjectConfigController::class, 'index'])->name('index');
            Route::post('/parse-sql-file', [ProjectConfigController::class, 'parseSqlFile'])->name('parse-sql-file'); 
        });
    });
});





require __DIR__.'/auth.php';