<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\DominioController;
use App\Http\Controllers\UsuarioController;
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
use App\Http\Controllers\AuthController;

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

// RUTAS PÚBLICAS
Route::get('/health', function () {
    return response()->json([
        'success' => true,
        'message' => 'API funcionando correctamente',
        'timestamp' => now(),
        'version' => '1.0.0'
    ]);
});

// AUTH PÚBLICO
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');
    Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
});

// RUTAS PROTEGIDAS - SOLO ADMIN
Route::middleware(['auth:api', 'rol:admin'])->group(function () {
    Route::apiResource('dominios', DominioController::class);
    Route::apiResource('usuarios', UsuarioController::class);
    Route::apiResource('parametros', ParametroController::class);
    
    // Rutas exclusivas de admin
    Route::get('/admin/dashboard', function () {
        return response()->json(['message' => 'Dashboard de administrador']);
    });
});

// RUTAS PROTEGIDAS - ADMIN Y CONTROL ESCOLAR
Route::middleware(['auth:api', 'rol:admin,control_escolar'])->group(function () {
    // Todas las rutas de gestión escolar
    Route::apiResource('alumnos', AlumnoController::class);
    Route::apiResource('alumnos-personales', AlumnoPersonalController::class);
    Route::apiResource('docentes', DocenteController::class);
    Route::apiResource('grupos', GrupoController::class);
    Route::apiResource('inscripciones', InscripcionController::class);
    Route::apiResource('cardex', CardexController::class);
    Route::apiResource('plan-estudios', PlanEstudioController::class);
    Route::apiResource('reticulas', ReticulaController::class);
    Route::apiResource('tabulador-pagos', TabuladorPagoController::class);
    Route::apiResource('deudores', DeudorController::class);
    Route::apiResource('historico-pagos', HistoricoPagoController::class);
    
    // Rutas específicas de control escolar
    Route::get('/control-escolar/reportes', function () {
        return response()->json(['message' => 'Reportes de control escolar']);
    });
});

// RUTAS PÚBLICAS (sin autenticación)
Route::apiResource('estados', EstadoController::class)->only(['index', 'show']);
Route::apiResource('municipios', MunicipioController::class)->only(['index', 'show']);