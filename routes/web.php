<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;

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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::delete('/productos/{producto}', [ProductoController::class, 'delete'])->name('productos.delete');
    Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::get('/nuevo', [ProductoController::class, 'nuevo'])->name('productos.nuevo');
    Route::post('/nuevo', [ProductoController::class, 'store'])->name('productos.store');



});



require __DIR__.'/auth.php';
