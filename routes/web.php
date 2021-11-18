<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\VacanteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify' => true]);


// Rutas Protegidas

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/vacantes', [VacanteController::class, 'index'])->name('vacantes.index');
    Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacantes.create');
    Route::post('/vacantes', [VacanteController::class, 'store'])->name('vacantes.store');
    Route::delete('/vacantes/{vacante}', [VacanteController::class, 'destroy'])->name('vacantes.destroy');
    Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->name('vacantes.edit');
    Route::put('/vacantes/{vacante}', [VacanteController::class, 'update'])->name('vacantes.update');

    // Subir Imagenes
    Route::post('/vacantes/imagen', [VacanteController::class, 'imagen'])->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen', [VacanteController::class, 'borrarimagen'])->name('vacantes.borrar');

    //Cambiar estado
    Route::post('/vacantes/{vacante}', [VacanteController::class, 'estado'])->name('vacantes.estado');

    //Notificaciones
    Route::get('notificaciones', NotificacionesController::class)->name('notificaciones');


});

// Pagina de Inicio
Route::get('/', InicioController::class)->name('inicio');
// Categorias
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');

// Busqueda de vacantes
Route::post('/busqueda', [VacanteController::class, 'buscar'])->name('vacantes.buscar');
Route::get('/busqueda', [VacanteController::class, 'resultados'])->name('vacantes.resultados');

// No Auth
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');
Route::get('/candidatos/{id}', [CandidatoController::class, 'index'])->name('candidatos.index');

// Enviar datos para una vacante
Route::post('/candidatos/store', [CandidatoController::class, 'store'])->name('candidatos.store');


