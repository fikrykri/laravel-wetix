<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function () {

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/theaters', [App\Http\Controllers\Dashboard\TheatersController::class, 'index'])->name('dashboard.theaters');
    Route::get('/dashboard/tickets', [App\Http\Controllers\Dashboard\TicketController::class, 'index'])->name('dashboard.tickets');

    //Movies
    Route::get('/dashboard/movies', [App\Http\Controllers\Dashboard\MovieController::class, 'index'])->name('dashboard.movies');
    Route::get('/dashboard/movies/create', [App\Http\Controllers\Dashboard\MovieController::class, 'create'])->name('dashboard.movies.create');
    Route::get('/dashboard/movies/{movie}', [App\Http\Controllers\Dashboard\MovieController::class, 'edit'])->name('dashboard.movies.edit');
    Route::put('/dashboard/movies/{movie}', [App\Http\Controllers\Dashboard\MovieController::class, 'update'])->name('dashboard.movies.update');
    Route::post('/dashboard/movies', [App\Http\Controllers\Dashboard\MovieController::class, 'store'])->name('dashboard.movies.store');
    Route::delete('/dashboard/movies', [App\Http\Controllers\Dashboard\MovieController::class, 'destroy'])->name('dashboard.movies.delete');

    // Users
    Route::get('/dashboard/users', [App\Http\Controllers\Dashboard\UserController::class, 'index'])->name('dashboard.users');
    Route::get('/dashboard/users/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'edit'])->name('dashboard.users.edit');
    Route::put('/dashboard/users/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'update'])->name('dashboard.users.update');
    Route::delete('/dashboard/users/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'destroy'])->name('dashboard.users.delete');
});
