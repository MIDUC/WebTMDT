<?php

use App\Http\Controllers\ProvinceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\AuthController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DistrictController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile']); // Lấy thông tin hồ sơ
    Route::put('/profile', [AuthController::class, 'updateProfile']); // Cập nhật hồ sơ
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/provinces/store', [ProvinceController::class, 'store']); // Create
    Route::put('/provinces/update/{id}', [ProvinceController::class, 'update']); // Update
    Route::delete('/provinces/delete/{id}', [ProvinceController::class, 'delete']); // Delete
    Route::get('/provinces/listing', [ProvinceController::class, 'listing']); // Listing
});

// Ward routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/wards/store', [WardController::class, 'store']); // Create
    Route::put('/wards/update/{id}', [WardController::class, 'update']); // Update
    Route::delete('/wards/delete/{id}', [WardController::class, 'delete']); // Delete
    Route::get('/wards/listing', [WardController::class, 'listing']); // Listing
});

// Service routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/services/store', [ServiceController::class, 'store']); // Create
    Route::put('/services/update/{id}', [ServiceController::class, 'update']); // Update
    Route::delete('/services/delete/{id}', [ServiceController::class, 'delete']); // Delete
    Route::get('/services/listing', [ServiceController::class, 'listing']); // Listing
});

// Post routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/posts/store', [PostController::class, 'store']); // Create
    Route::put('/posts/update/{id}', [PostController::class, 'update']); // Update
    Route::delete('/posts/delete/{id}', [PostController::class, 'delete']); // Delete
    Route::get('/posts/listing', [PostController::class, 'listing']); // Listing
    Route::get('/posts/detail/{id}', [PostController::class, 'detail']); // detail
    Route::get('/user/posts', [PostController::class,'getPostByUser']); // Search
});

// Product routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products/store', [ProductController::class, 'store']); // Create
    Route::put('/products/update/{id}', [ProductController::class, 'update']); // Update
    Route::delete('/products/delete/{id}', [ProductController::class, 'delete']); // Delete
    Route::get('/products/listing', [ProductController::class, 'listing']); // Listing
    Route::get('/products/detail/{id}', [ProductController::class, 'detail']); // detail
});

// District routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/districts/store', [DistrictController::class, 'store']); // Create
    Route::put('/districts/update/{id}', [DistrictController::class, 'update']); // Update
    Route::delete('/districts/delete/{id}', [DistrictController::class, 'delete']); // Delete
    Route::get('/districts/listing', [DistrictController::class, 'listing']); // Listing
});
