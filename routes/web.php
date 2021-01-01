<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CartController;
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

Route::get('/admins',[AdminController::class,'index'])->name('admins.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
Route::get('/sells',[OrderController::class,'sells'])->name('orders.sells');
Route::get('/orders/{id}',[OrderController::class,'show'])->name('orders.show');
Route::post('/orders',[OrderController::class,'store'])->name('orders.store');

Route::get('/shops',[ShopController::class,'index'])->name('shops.index');

Route::get('/books/create',[BookController::class,'create'])->name('books.create');
Route::get('/books/{id}',[BookController::class,'show'])->name('books.show');
Route::get('/books/{id}/edit',[BookController::class,'edit'])->name('books.edit');
Route::patch('/books/{id}',[BookController::class,'update'])->name('books.update');

Route::post('/books',[BookController::class,'store'])->name('books.store');

Route::delete('/books/{book}',[BookController::class,'destroy'])->name('books.destroy');

Route::delete('/member/{member}',[MemberController::class,'destroy'])->name('members.destroy');
Route::post('/member',[MemberController::class,'store'])->name('members.store');
Route::get('/shops/{id}',[MemberController::class,'shop'])->name('members.shop')->where('id', '[0-9]+');

Route::get('members/{member}',[MemberController::class,'show'])->name('members.show')->middleware('auth');
Route::get('/search',[BookController::class,'search'])->name('books.search');

Route::get('/carts',[CartController::class,'create'])->name('carts.index');
Route::post('/carts',[CartController::class,'store'])->name('carts.store');
Route::delete('/carts/{cart}',[CartController::class,'destroy'])->name('carts.destroy');

Route::get('/logout',[MemberController::class,'logout'])->name('members.logout');

