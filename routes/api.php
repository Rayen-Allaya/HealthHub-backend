<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AvailibilityController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\ReviewController;

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
Route::get('/me', [UserController::class, 'me']);
Route::delete('/users/delete/{id}', [UserController::class, 'delete']);
Route::put('/user/update/{id}', [UserController::class, 'update']);

Route::get('/doctors/{doctor_id}/reviews', [ReviewController::class, 'index']);
Route::delete('/reviews/{id}', [ReviewController::class, 'delete']);

Route::get('/doctors/{doctor_id}/appointments', [AppointmentController::class, 'index']);
Route::get('/doctors/{doctor_id}/availibilities', [AvailibilityController::class, 'index']);

Route::get("/appointments", [AppointmentController::class, 'index']);
Route::get("/appointmentsHistory", [AppointmentController::class, 'history']);

Route::get('/appointments/{id}/create', [AppointmentController::class, 'create']);



// Route::get('/appointments/create', [AppointmentController::class, 'index']);
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

//login user
Route::post('/auth/login', [AuthController::class, 'loginUser'])->name('login');

//logout user
Route::post('auth/logout', [AuthController::class, 'logoutUser']);
