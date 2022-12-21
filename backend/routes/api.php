<?php

use App\Http\Controllers\ListConstroller;
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

Route::get('/lista', [ListConstroller::class, 'listagem']);
Route::post('/adicionar', [ListConstroller::class, 'adicionar']);
Route::get('/editar/{user}', [ListConstroller::class, 'editar']);
Route::put('/update/{user}', [ListConstroller::class, 'update']);
Route::delete('/delete/{user}', [ListConstroller::class, 'delete']);

