<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MaterialController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/material/{material}', [MaterialController::class, 'show']);
Route::get('/material/export/{material}', [MaterialController::class, 'downloadText']);
Route::get('/create', [MaterialController::class, 'create']);
