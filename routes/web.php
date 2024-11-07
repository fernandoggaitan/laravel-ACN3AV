<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\MascotaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tareas', [
    TareaController::class,
    'index'
])->name('tareas.index');

Route::get('/tareas/create', [
    TareaController::class,
    'create'
])->name('tareas.create');

Route::post('/tareas', [
    TareaController::class,
    'store'
])->name('tareas.store');


//Rutas donde el usuario tiene que ser administrador.
Route::middleware(['auth', 'verified', 'is_admin'])->group(function(){
    //Rutas para controlador de recurso de las mascotas.
    Route::resource('/mascotas', MascotaController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
