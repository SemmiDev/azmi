<?php

use App\Http\Controllers\AraneKewanController;
use App\Http\Controllers\DongengController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TembangDolananController;
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


Route::get('/tembang_dolanan', [TembangDolananController::class, 'index'])->name('tembang_dolanan.index');
Route::get('/tembang_dolanan/create', [TembangDolananController::class, 'create'])->name('tembang_dolanan.create');
Route::post('/tembang_dolanan', [TembangDolananController::class, 'store'])->name('tembang_dolanan.store');
Route::get('/tembang_dolanan/{tembang}', [TembangDolananController::class, 'show'])->name('tembang_dolanan.show');
Route::get('/tembang_dolanan/{tembang}/edit', [TembangDolananController::class, 'edit'])->name('tembang_dolanan.edit');
Route::patch('/tembang_dolanan/{tembang}', [TembangDolananController::class, 'update'])->name('tembang_dolanan.update');
Route::delete('/tembang_dolanan/{tembang}', [TembangDolananController::class, 'destroy'])->name('tembang_dolanan.destroy');

Route::get('/arane_kewan', [AraneKewanController::class, 'index'])->name('arane_kewan.index');
Route::get('/arane_kewan/create', [AraneKewanController::class, 'create'])->name('arane_kewan.create');
Route::post('/arane_kewan', [AraneKewanController::class, 'store'])->name('arane_kewan.store');
Route::get('/arane_kewan/{araneKewan}', [AraneKewanController::class, 'show'])->name('arane_kewan.show');
Route::get('/arane_kewan/{araneKewan}/edit', [AraneKewanController::class, 'edit'])->name('arane_kewan.edit');
Route::patch('/arane_kewan/{araneKewan}', [AraneKewanController::class, 'update'])->name('arane_kewan.update');
Route::delete('/arane_kewan/{araneKewan}', [AraneKewanController::class, 'destroy'])->name('arane_kewan.destroy');

require __DIR__.'/auth.php';
