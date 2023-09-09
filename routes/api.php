<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\apiController;

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

Route::get('/list-employee', [apiController::class, 'listEmployee']);

Route::get('single-employee', [apiController::class, 'getSingleEmployee']);

Route::post('/add-employee', [apiController::class, 'createEmployee']);


Route::put('update-employee', [apiController::class, 'updateEmployee']);


Route::delete('delete-employee', [apiController::class, 'deleteEmployee']);
