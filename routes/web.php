<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MenuUiController;

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
    return view('test');
});

//menu ui template
Route::get('/UI/button', [MenuUiController::class,'showbutton'])->name('button');
Route::get('/UI/general', [MenuUiController::class,'showgeneral'])->name('general');
Route::get('/UI/modals', [MenuUiController::class,'showmodals'])->name('modals');
Route::get('/UI/navbar', [MenuUiController::class,'shownavbar'])->name('navbar');
Route::get('/UI/ribbons', [MenuUiController::class,'showribbons'])->name('ribbons');
Route::get('/UI/sliders', [MenuUiController::class,'showsliders'])->name('sliders');
Route::get('/UI/timeline', [MenuUiController::class,'showtimeline'])->name('timeline');
Route::get('/UI/icons', [MenuUiController::class,'showicons'])->name('icons');

//membuat route Categories
Route::get('/sekolah/category', [CategoriesController::class, 'index'])->name('category.index');
Route::get('/sekolah/category/create', [CategoriesController::class, 'create'])->name('category.create');
Route::post('/sekolah/category', [CategoriesController::class, 'store'])->name('category.store');
Route::get('/sekolah/category/{id}/edit', [CategoriesController::class, 'edit'])->name('category.edit');
Route::put('/sekolah/category/{id}', [CategoriesController::class, 'update'])->name('category.update');
Route::delete('/sekolah/category/{id}', [CategoriesController::class, 'destroy'])->name('category.destroy');

//membuat route user
Route::get('/sekolah/user', [UsersController::class, 'index'])->name('user.index');
Route::get('/sekolah/user/create', [UsersController::class, 'create'])->name('user.create');
Route::post('/sekolah/user', [UsersController::class, 'store'])->name('user.store');
Route::get('/sekolah/user/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
Route::put('/sekolahuser/{id}', [UsersController::class, 'update'])->name('user.update');
Route::delete('/sekolahuser/{id}', [UsersController::class, 'destroy'])->name('user.destroy');

//membuat product route
Route::get('/sekolah/product', [ProductsController::class, 'index'])->name('product.index'); //untuk menampilkan index
Route::get('/sekolah/product/create', [ProductsController::class, 'create'])->name('product.create'); //untuk menampilkan form product
Route::post('/sekolah/product', [ProductsController::class, 'store'])->name('product.store'); // untuk melakukan proses simpan
Route::get('/sekolah/product/{id}/edit', [ProductsController::class, 'edit'])->name('product.edit'); //untuk menampilkan form edit sesuai id
Route::put('/sekolahproduct/{id}', [ProductsController::class, 'update'])->name('product.update'); //untuk melakukan proses update sesuai id
Route::delete('product/{id}', [ProductsController::class, 'destroy'])->name('product.destroy'); //untuk menghapusan proses delete sesuai id

//membuat route customers
Route::get('/sekolah/customer', [CustomersController::class, 'index'])->name('customer.index');
Route::get('/sekolah/customer/create', [CustomersController::class, 'create'])->name('customer.create');
Route::post('/sekolah/customer', [CustomersController::class, 'store'])->name('customer.store');
Route::get('/sekolah/customer/{id}/edit', [CustomersController::class, 'edit'])->name('customer.edit');
Route::put('/sekolahcustomer/{id}', [CustomersController::class, 'update'])->name('customer.update');
Route::delete('/sekolah/customer/{id}', [CustomersController::class, 'destroy'])->name('customer.destroy');

//membuat route transactions
Route::get('/sekolah/transaction', [TransactionController::class, 'index'])->name('transaction.index');
Route::get('/sekolah/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
Route::post('/sekolah/transaction', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('/sekolah/transaction/{id}', [TransactionController::class, 'show'])->name('transaction.show');
Route::delete('/sekolah/transaction/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');