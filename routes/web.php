<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ShopController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/mhome', function () {
    return view('mhome');})->name('mhome');

Route::get('/home',[HomeController::class,'home'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
Route::get('/orders/{id}',[OrderController::class,'show'])->name('orders.show');

Route::get('/shops',[ShopController::class,'index'])->name('shops.index');

Route::get('/books/create',[BookController::class,'create'])->name('books.create');
Route::get('/books/{id}',[OrderController::class,'show'])->name('books.show');

Route::post('/books',[BookController::class,'store'])->name('books.store');

Route::delete('/books/{book}',[BookController::class,'destroy'])->name('books.destroy');
