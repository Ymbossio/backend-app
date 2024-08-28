<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovilesController;


Route::get('/moviles', [MovilesController::class, 'index']);
Route::get('/moviles/{id}', [MovilesController::class, 'show']);
Route::post('/moviles', [MovilesController::class, 'store']);
Route::put('/moviles/{id}', [MovilesController::class, 'update']);
Route::delete('/moviles/{id}', [MovilesController::class, 'destroy']);
Route::get('/paises', [MovilesController::class, 'paises']);

