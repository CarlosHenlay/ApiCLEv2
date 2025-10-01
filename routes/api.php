<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\DominioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuarioAlumnoController;
use App\Http\Controllers\TabuladorPagoController;
use App\Http\Controllers\PlanEstudioController;
use App\Http\Controllers\ReticulaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnoPersonalController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\CardexController;
use App\Http\Controllers\DeudorController;
use App\Http\Controllers\HistoricoPagoController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\ParametroController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Rutas API para todas las tablas
Route::apiResource('estados', EstadoController::class);
Route::apiResource('municipios', MunicipioController::class);
Route::apiResource('dominios', DominioController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('usuarios-alumnos', UsuarioAlumnoController::class);
Route::apiResource('tabulador-pagos', TabuladorPagoController::class);
Route::apiResource('plan-estudios', PlanEstudioController::class);
Route::apiResource('reticulas', ReticulaController::class);
Route::apiResource('alumnos', AlumnoController::class);
Route::apiResource('alumnos-personales', AlumnoPersonalController::class);
Route::apiResource('docentes', DocenteController::class);
Route::apiResource('grupos', GrupoController::class);
Route::apiResource('cardex', CardexController::class);
Route::apiResource('deudores', DeudorController::class);
Route::apiResource('historico-pagos', HistoricoPagoController::class);
Route::apiResource('inscripciones', InscripcionController::class);
Route::apiResource('parametros', ParametroController::class);

// Ruta de verificación de API
Route::get('/health', function () {
    return response()->json([
        'success' => true,
        'message' => 'API funcionando correctamente',
        'timestamp' => now(),
        'version' => '1.0.0'
    ]);
});

// Ruta para obtener el usuario autenticado (si implementas autenticación después)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});