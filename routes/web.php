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
    Route::prefix('stock')->group(function () {
        Route::get('/', [StockController::class, 'index'])->name('stock.index');
        Route::post('{id}/increase', [StockController::class, 'increaseStock'])->name('stock.increase');
        Route::post('{id}/decrease', [StockController::class, 'decreaseStock'])->name('stock.decrease');
        Route::post('/update', [StockController::class, 'update'])->name('stock.update');
        Route::post('/stock/insert', [StockController::class, 'insert'])->name('stock.insert');
    });

    // Rotas do ProductController
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index'); // Página de listagem de produtos
        Route::get('/data', [ProductController::class, 'getData'])->name('products.data');
        Route::resource('create', ProductController::class)->only(['create', 'store']);
    });
    
    // Outras rotas protegidas
    Route::resource('users', UserController::class)->only(['create', 'store']);
});