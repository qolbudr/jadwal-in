<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ScheduleController;

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
    Route::get('/jadwal/get', [DashboardController::class, 'getSchedule']);
    Route::get('/ruangan/get', [DashboardController::class, 'getRoom']);
    
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

    Route::get('/prodi', [ProdiController::class, 'index']);
    Route::post('/prodi/insert', [ProdiController::class, 'insert']);
    Route::get('/prodi/delete/{id}', [ProdiController::class, 'delete']);
    Route::get('/prodi/fetch/{id}', [ProdiController::class, 'fetch']);
    Route::post('/prodi/edit', [ProdiController::class, 'edit']);

    Route::get('/kelas', [ClassesController::class, 'index']);
    Route::post('/kelas/insert', [ClassesController::class, 'insert']);
    Route::get('/kelas/delete/{id}', [ClassesController::class, 'delete']);
    Route::get('/kelas/fetch/{id}', [ClassesController::class, 'fetch']);
    Route::post('/kelas/edit', [ClassesController::class, 'edit']);

    Route::get('/matkul', [SubjectController::class, 'index']);
    Route::post('/matkul/insert', [SubjectController::class, 'insert']);
    Route::get('/matkul/delete/{id}', [SubjectController::class, 'delete']);
    Route::get('/matkul/fetch/{id}', [SubjectController::class, 'fetch']);
    Route::post('/matkul/edit', [SubjectController::class, 'edit']);

    Route::get('/jadwal', [ScheduleController::class, 'index']);
    Route::post('/jadwal/insert', [ScheduleController::class, 'insert']);
    Route::get('/jadwal/delete/{id}', [ScheduleController::class, 'delete']);
    Route::get('/jadwal/fetch/{id}', [ScheduleController::class, 'fetch']);
    Route::post('/jadwal/edit', [ScheduleController::class, 'edit']);
});