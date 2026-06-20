<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PosController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/menu', [MenuController::class, 'index']);

    Route::get('/menu/create', [MenuController::class, 'create']);
    Route::post('/menu', [MenuController::class, 'store']);

    Route::get('/menu/{id}/edit', [MenuController::class, 'edit']);
    Route::put('/menu/{id}', [MenuController::class, 'update']);

    Route::patch('/menu/{menu}/toggle-status', [MenuController::class, 'toggleStatus']);

});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test', function () {

    $menu = App\Models\Menu::find(1);

    return $menu->category->nama;

});

Route::get('/sales', [SaleController::class, 'index']);
Route::post('/sales', [SaleController::class, 'store']);
Route::get('/sales/create', [SaleController::class, 'create']);

Route::get('/pos', [App\Http\Controllers\PosController::class, 'index'])->name('pos.index');
Route::post('/pos', [App\Http\Controllers\PosController::class, 'store'])->name('pos.store');


Route::get('/receipt/{id}', [PosController::class, 'receipt'])
    ->name('receipt');

Route::get('/receipt/{id}/pdf', [PosController::class, 'pdf'])
    ->name('receipt.pdf');

require __DIR__.'/auth.php';
