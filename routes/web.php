<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MaterialController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/search', [IndexController::class, 'search']);

Route::get('/create', [MaterialController::class, 'create']);
Route::post('/store', [MaterialController::class, 'store']);
Route::get('/show/{material}', [MaterialController::class, 'show']);
Route::delete('/delete/{material}', [MaterialController::class, 'delete']);
Route::get('/edit/{material}', [MaterialController::class, 'edit']);
Route::put('/edit/{material}', [MaterialController::class, 'update']);
Route::get('/material/export/{material}', [MaterialController::class, 'downloadText']);
