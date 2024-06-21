<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProjectYearController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);
  
Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::post('/students', [StudentController::class, 'store']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
Route::get('/years/{year}', [ProjectYearController::class, 'show']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    // Route::get('/students', [StudentController::class, 'index']);
    // Route::get('/students/{id}', [StudentController::class, 'show']);
    // Route::post('/students', [StudentController::class, 'store']);
    // Route::put('/students/{id}', [StudentController::class, 'update']);
    // Route::delete('/students/{id}', [StudentController::class, 'destroy']);

    // Route::get('/projects', [ProjectController::class, 'index']);
    // Route::get('/projects/{id}', [ProjectController::class, 'show']);
    // Route::post('/projects', [ProjectController::class, 'store']);
    // Route::put('/projects/{id}', [ProjectController::class, 'update']);
    // Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
    // Route::get('/years/{year}', [ProjectYearController::class, 'show']);
    });
