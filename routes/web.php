<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MaterialController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/create', [MaterialController::class, 'create']);
