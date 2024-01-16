<?php

use App\Http\Controllers\DongengController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    // redictect to login if not logged in
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/dongeng', [DongengController::class, 'index'])->name('dongeng.index');
Route::get('/dongeng/create', [DongengController::class, 'create'])->name('dongeng.create');
Route::post('/dongeng', [DongengController::class, 'store'])->name('dongeng.store');
Route::get('/dongeng/{dongeng}', [DongengController::class, 'show'])->name('dongeng.show');
Route::get('/dongeng/{dongeng}/edit', [DongengController::class, 'edit'])->name('dongeng.edit');
Route::patch('/dongeng/{dongeng}', [DongengController::class, 'update'])->name('dongeng.update');
Route::delete('/dongeng/{dongeng}', [DongengController::class, 'destroy'])->name('dongeng.destroy');

require __DIR__.'/auth.php';
