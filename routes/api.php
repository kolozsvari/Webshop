<?php

use App\Http\Controllers\WebshopController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/webshop', [WebshopController::class,'index']);
Route::get('/webshop/{id}', [WebshopController::class,'show']);
Route::put('/webshop/{id}', [WebshopController::class,'update']);