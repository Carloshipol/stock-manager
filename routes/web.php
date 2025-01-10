<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

// Rotas de autenticação personalizadas com o AuthController
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Página inicial do site
Route::get('/', function () {
    return view('index');
})->name('home'); // Página principal antes de login

// Rota protegida por middleware 'auth' (apenas para usuários autenticados)
Route::middleware(['auth'])->group(function () {
    // Esta será a rota da página principal do usuário após login
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Rotas do controlador de estoque
    Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
    Route::post('/stock/{id}/increase', [StockController::class, 'increaseStock'])->name('stock.increase');
    Route::post('/stock/{id}/decrease', [StockController::class, 'decreaseStock'])->name('stock.decrease');
    Route::post('/stock/update', [StockController::class, 'update'])->name('stock.update');
    
    // Outras rotas protegidas
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});