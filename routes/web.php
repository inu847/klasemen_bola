<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KlubController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\SkorController;
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

Route::get('/', [LandingPageController::class, 'index'])->name('landingpage.index');
Route::get('p/klub/{id}', [LandingPageController::class, 'show'])->name('landingpage.show');

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('/klub/check', [KlubController::class, 'check'])->name('klub.check');
    Route::get('/skoer/create-multiple', [SkorController::class, 'create_multiple'])->name('skor.create_multiple');
    Route::post('/skoer/store-multiple', [SkorController::class, 'store_multiple'])->name('skor.store_multiple');
    
    Route::resource('klub', KlubController::class);
    Route::resource('skor', SkorController::class);
});