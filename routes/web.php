<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\RoomController;

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

Route::get('/', [DashboardController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    
    Route::get('/dosen', [DosenController::class, 'index']);
    Route::post('/dosen/insert', [DosenController::class, 'insert']);
    Route::get('/dosen/delete/{id}', [DosenController::class, 'delete']);
    Route::get('/dosen/fetch/{id}', [DosenController::class, 'fetch']);
    Route::post('/dosen/edit', [DosenController::class, 'edit']);
    
    Route::get('/ruangan', [RoomController::class, 'index']);
    Route::post('/ruangan/insert', [RoomController::class, 'insert']);
    Route::get('/ruangan/delete/{id}', [RoomController::class, 'delete']);
    Route::get('/ruangan/fetch/{id}', [RoomController::class, 'fetch']);
    Route::post('/ruangan/edit', [RoomController::class, 'edit']);
});