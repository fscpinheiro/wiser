<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

//INICIAL
Route::get('/', function (){
    return view('welcome');
});
//OBSERVER
Route::get('/observer', function () {
    return view('teste');
});
Route::post('/user/create', [UserController::class, 'store']);
Route::put('/user/update', [UserController::class, 'update']);
Route::delete('/user/delete', [UserController::class, 'destroy']);
Route::get('/logs', [UserController::class, 'getLogs']);
//ELOQUENT
Route::get('/eloquent', [ProductController::class, 'index']);