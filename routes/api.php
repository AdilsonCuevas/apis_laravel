<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personajesController;

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


Route::get('/characters/list', [personajesController::class, 'list']);
Route::get('/api/characters/details/{id}', [personajesController::class, 'details'])->name('detalles');


    Route::post('/characters/save{id}', [personajesController::class, 'save'])->name('save_character');
    Route::post('/api/characters/update', [personajesController::class, 'update'])->name('updateData');
    Route::delete('/characters/delete/{id}', [personajesController::class, 'delete'])->name('destroy_character');
