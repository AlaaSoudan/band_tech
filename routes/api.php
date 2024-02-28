<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


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



Route::apiResource('users', UserController::class);
Route::get('products', [ProductController::class,'index']);
Route::post('products', [ProductController::class,'store']);
Route::get('product/{slug}', [ProductController::class,'showbyslug']);
Route::put('products/update/{slug}', [ProductController::class ,'update']);
Route::delete('products/delete/{slug}', [ProductController::class ,'destroy']);

Route::post('register', [RegisterController::class ,'register']);
Route::post('login', [LoginController::class, 'login']);

