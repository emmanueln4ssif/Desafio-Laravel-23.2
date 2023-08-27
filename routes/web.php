<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return redirect(route('dashboard'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('funcionarios')->group(function () {
    
    Route::get('', [UserController::class, 'index'])->name('funcionarios.index');
    Route::get('/create', [UserController::class, 'create'])->name('funcionarios.create');
    Route::get('/{funcionario}/edit', [UserController::class, 'edit'])->name('funcionarios.edit');
    Route::get('/{funcionario}', [UserController::class, 'show'])->name('funcionarios.show');
    Route::post('', [UserController::class, 'store'])->name('funcionarios.store');
    Route::post('/{funcionario}', [UserController::class, 'update'])->name('funcionarios.update');
    Route::post('/delete/{funcionario}', [UserController::class, 'destroy'])->name('funcionarios.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
