<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/perusahaan/{id}', [PerusahaanController::class, 'show']);
Route::get('/students', [StudentController::class, 'index']);
Route::post('/students', [StudentController::class, 'store']);

Route::apiResource('/customers', CustomerController::class);
