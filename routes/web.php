<?php

use App\Http\Controllers\Admin\DashboardController as AdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Guest\DashboardController as GuestController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class , 'home'])->name('home');
    Route::resource("/project", ProjectController::class);
});

Route::name('guest.')->group(function () {
    Route::get('/', [GuestController::class , 'home'])->name('home');
});
