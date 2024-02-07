<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth');
Route::put('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'delete'])->middleware('auth');
Route::get('/jobs/manage', [JobController::class, 'manage'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/users/profile', [UserController::class, 'profile'])->middleware('auth');
Route::get('/edit-profile', [UserController::class, 'profileEdit'])->middleware('auth');
Route::put('/users/edit-profile', [UserController::class, 'update']);
Route::get('/change-password', [UserController::class, 'changePassword'])->middleware('auth');
Route::post('change-password', [UserController::class, 'updatePassword']);

