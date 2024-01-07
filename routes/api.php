<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AvailibilityController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DoctorProfileController;
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

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'add']);
Route::get('/users/{id}', [UserController::class, 'getById']);
Route::delete('/users/delete/{id}', [UserController::class, 'delete']);
Route::put('/user/update/{id}', [UserController::class, 'update']);

Route::get('/reviews', [ReviewController::class, 'index']);
Route::delete('/reviews/{id}', [ReviewController::class, 'delete']);

Route::get('/appointments', [AppointmentController::class, 'index']);
Route::get('/availibilities', [AvailibilityController::class, 'index']);

Route::get('/appointments/create', [AppointmentController::class, 'index']);
Route::put('/appointments/update/{id}', [AppointmentController::class, 'update']);
Route::delete('/appointments/delete/{id}', [AppointmentController::class, 'delete']);

Route::get('/availibilities/create', [AvailibilityController::class, 'index']);
Route::put('/availibilities/update/{id}', [AvailibilityController::class, 'update']);
Route::delete('/availibilities/delete/{id}', [AvailibilityController::class, 'delete']);

Route::get('/doctors', [DoctorProfileController::class, 'index']);
Route::post('/doctors/add', [DoctorProfileController::class, 'add']);
Route::get('/doctors/{id}', [DoctorProfileController::class, 'getById']);
Route::put('/doctors/update/{id}', [DoctorProfileController::class, 'update']);
Route::delete('/doctors/delete/{id}', [DoctorProfileController::class, 'delete']);
Route::get('/doctors/search', [DoctorProfileController::class, 'search']);
