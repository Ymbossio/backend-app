<?php
use App\Http\Controllers\MovilesController;
use Illuminate\Support\Facades\Route;

/*Route::get('/moviles', function () {
    return view('welcome');
});*/

Route::get('/moviles', [MovilesController::class, 'index']);
Route::post('/moviles', [MovilesController::class, 'store']);
Route::put('/moviles/{id}', [MovilesController::class, 'update']);
Route::delete('/moviles/{id}', [MovilesController::class, 'destroy']);

