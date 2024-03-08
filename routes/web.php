<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoanController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('boxes', BoxController::class)->middleware('auth');
Route::resource('items', ItemController::class)->middleware('auth');
// ruta a destroy de items con id
Route::delete('/items/delete/{id}', [ItemController::class, 'destroy'])->name('items.delete');

Route::resource('loans', LoanController::class)->middleware('auth');
// ruta a create de loans con id
Route::get('/loans/create/{id}', [LoanController::class, 'create'])->name('loans.create');


// Route::post('/items', [ItemController::class, 'store'])->name('items.store');
// Route::get('/loans', [LoanController::class, 'create'])->name('loans.create');
// Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');

require __DIR__.'/auth.php';
