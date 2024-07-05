<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\AdminController;

// Rutas protegidas para administradores
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/estadisticas', [AdminController::class, 'mostrarEstadisticas'])->name('admin.estadisticas');
    Route::get('/admin/gestion-usuarios', [AdminController::class, 'gestionUsuarios'])->name('admin.gestion-usuarios');
    Route::put('/admin/gestion-usuarios/{id}', [AdminController::class, 'cambiarRol'])->name('admin.cambiar-rol');
});

// Rutas protegidas para usuarios autenticados
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('preguntas', PreguntaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('subcategorias', SubcategoriaController::class);
    Route::get('examen', [ExamenController::class, 'index'])->name('examen.index');
    Route::post('examen', [ExamenController::class, 'store'])->name('examen.store');
});

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Ruta para el dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
