<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Models\characters;

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
Route::get('/', function () {
    return view('welcome');
});
Route::get('register', function () {
    return view('register');
});
Route::get('login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::get('dashboard', function () {
    $responses = [];
    return view('principal', compact('responses'));
})->middleware('auth');

Route::get('/personajes', function () {
    $character = characters::all();
    return view('personakes', compact('character'));
})->middleware('auth');

Route::post('/logins', [userController::class, 'show']);
Route::post('/logout', [userController::class, 'logout']);
Route::post('/registers', [userController::class, 'create']);