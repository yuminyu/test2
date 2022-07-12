<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamsController;

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


Route::get('/', [TeamsController::class, 'index']);

Route::post('teams',[TeamsController::class, 'store']);

Route::get('team/{team_id}', [TeamsController::class, 'join']);

Route::get('teamedit/{team}',[TeamsController::class,'edit']);

Route::post('teams/update',  [TeamsController::class, 'update']);

Route::get('teams/{team}', [TeamsController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
