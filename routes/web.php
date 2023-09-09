<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\PDFController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('funcionarios')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('funcionarios.index');
        Route::get('/create', [UserController::class, 'create'])->name('funcionarios.create');
        Route::get('/{funcionario}/edit', [UserController::class, 'edit'])->name('funcionarios.edit');
        Route::get('/{funcionario}', [UserController::class, 'show'])->name('funcionarios.show');
        Route::post('', [UserController::class, 'store'])->name('funcionarios.store');
        Route::post('/{funcionario}', [UserController::class, 'update'])->name('funcionarios.update');
        Route::post('/delete/{funcionario}', [UserController::class, 'destroy'])->name('funcionarios.destroy');
    });

    Route::prefix('animais')->group(function () {
        Route::get('', [AnimalController::class, 'index'])->name('animais.index');
        Route::get('/create', [AnimalController::class, 'create'])->name('animais.create');
        Route::get('/{animal}/edit', [AnimalController::class, 'edit'])->name('animais.edit');
        Route::get('/{animal}', [AnimalController::class, 'show'])->name('animais.show');
        Route::post('', [AnimalController::class, 'store'])->name('animais.store');
        Route::post('/{animal}', [AnimalController::class, 'update'])->name('animais.update');
        Route::post('/delete/{animal}', [AnimalController::class, 'destroy'])->name('animais.destroy');
    });

    Route::prefix('proprietarios')->group(function () {
        Route::get('', [ProprietarioController::class, 'index'])->name('proprietarios.index');
        Route::get('/create', [ProprietarioController::class, 'create'])->name('proprietarios.create');
        Route::get('/{proprietario}/edit', [ProprietarioController::class, 'edit'])->name('proprietarios.edit');
        Route::get('/{proprietario}', [ProprietarioController::class, 'show'])->name('proprietarios.show');
        Route::post('', [ProprietarioController::class, 'store'])->name('proprietarios.store');
        Route::post('/{proprietario}', [ProprietarioController::class, 'update'])->name('proprietarios.update');
        Route::post('/delete/{proprietario}', [ProprietarioController::class, 'destroy'])->name('proprietarios.destroy');
    });

    Route::prefix('consultas')->group(function () {
        Route::get('', [ConsultaController::class, 'index'])->name('consultas.index');
        Route::get('/create', [ConsultaController::class, 'create'])->name('consultas.create');
        Route::get('/{consulta}', [ConsultaController::class, 'show'])->name('consultas.show');
        Route::post('', [ConsultaController::class, 'store'])->name('consultas.store');
        Route::post('/delete/{consulta}', [ConsultaController::class, 'destroy'])->name('consultas.destroy');
    });

        Route::get('consulta/relatorio-pdf', [PDFController::class, 'geraPDF'])->name('consultas.pdf');


});

require __DIR__.'/auth.php';
