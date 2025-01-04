<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\StockController;

Route::get('/stock', [StockController::class, 'index']);