<?php

use App\Http\Controllers\AraneKewanController;
use App\Http\Controllers\DongengController;
use App\Http\Controllers\DongengGameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StartDongengGameController;
use App\Http\Controllers\TembangDolananController;
use App\Http\Controllers\UngahUnguhBasaController;
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


Route::get('/ungah_unguh_basa', [UngahUnguhBasaController::class, 'index'])->name('ungah_unguh_basa.index');
Route::get('/ungah_unguh_basa/create', [UngahUnguhBasaController::class, 'create'])->name('ungah_unguh_basa.create');
Route::post('/ungah_unguh_basa', [UngahUnguhBasaController::class, 'store'])->name('ungah_unguh_basa.store');
Route::get('/ungah_unguh_basa/{ungahUnguhBasa}', [UngahUnguhBasaController::class, 'show'])->name('ungah_unguh_basa.show');
Route::get('/ungah_unguh_basa/{ungahUnguhBasa}/edit', [UngahUnguhBasaController::class, 'edit'])->name('ungah_unguh_basa.edit');
Route::patch('/ungah_unguh_basa/{ungahUnguhBasa}', [UngahUnguhBasaController::class, 'update'])->name('ungah_unguh_basa.update');
Route::delete('/ungah_unguh_basa/{ungahUnguhBasa}', [UngahUnguhBasaController::class, 'destroy'])->name('ungah_unguh_basa.destroy');


Route::get('/dongeng_game/{dongeng}', [DongengGameController::class, 'index'])->name('dongeng_game.index');
Route::get('/dongeng_game/{dongeng}/create', [DongengGameController::class, 'create'])->name('dongeng_game.create');
Route::post('/dongeng_game/{dongeng}/store', [DongengGameController::class, 'store'])->name('dongeng_game.store');
Route::delete('/dongeng_game/{dongengGame}', [DongengGameController::class, 'destroy'])->name('dongeng_game.destroy');

Route::get('/start_dongeng_game/{dongeng}/material', [StartDongengGameController::class, 'material'])->name('start_dongeng_game.material');
Route::get('/start_dongeng_game/{dongeng}/play', [StartDongengGameController::class, 'play'])->name('start_dongeng_game.play');
Route::post('/start_dongeng_game/{dongeng}/check', [StartDongengGameController::class, 'check'])->name('start_dongeng_game.check');

require __DIR__.'/auth.php';
