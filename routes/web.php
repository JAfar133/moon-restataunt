<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/menu/{uri}', [HomeController::class, 'menuItems'])->name('menuItems');

Route::post('/cart/add', [HomeController::class, 'addItem'])->name('cart.add');
Route::delete('/cart/clear', [HomeController::class, 'clearCart'])->name('cart.clear');
Route::post('/card/remove/{id}', [HomeController::class, 'removeItem'])->name('cart.remove');
Route::post('/card/update/{id}', [HomeController::class, 'updateQuantity'])->name('cart.update');



Auth::routes();


