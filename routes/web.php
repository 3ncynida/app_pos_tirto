<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MenuUiController;

// Root route
Route::get('/', function () {
    return view('test');
});

// UI Routes
Route::prefix('UI')->name('UI.')->group(function () {
    Route::get('button', [MenuUiController::class, 'showbutton'])->name('button');
    Route::get('general', [MenuUiController::class, 'showgeneral'])->name('general');
    Route::get('modals', [MenuUiController::class, 'showmodals'])->name('modals');
    Route::get('navbar', [MenuUiController::class, 'shownavbar'])->name('navbar');
    Route::get('ribbons', [MenuUiController::class, 'showribbons'])->name('ribbons');
    Route::get('sliders', [MenuUiController::class, 'showsliders'])->name('sliders');
    Route::get('timeline', [MenuUiController::class, 'showtimeline'])->name('timeline');
    Route::get('icons', [MenuUiController::class, 'showicons'])->name('icons');
});

// Group routes for "Sekolah" prefix
Route::prefix('sekolah')->name('sekolah.')->group(function () {


    Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    // Categories Routes
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('index');
        Route::get('create', [CategoriesController::class, 'create'])->name('create');
        Route::post('/', [CategoriesController::class, 'store'])->name('store');
        Route::get('{id}/edit', [CategoriesController::class, 'edit'])->name('edit');
        Route::put('{id}', [CategoriesController::class, 'update'])->name('update');
        Route::delete('{id}', [CategoriesController::class, 'destroy'])->name('destroy');
    });

    // Users Routes
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::get('create', [UsersController::class, 'create'])->name('create');
        Route::post('/', [UsersController::class, 'store'])->name('store');
        Route::get('{id}/edit', [UsersController::class, 'edit'])->name('edit');
        Route::put('{id}', [UsersController::class, 'update'])->name('update');
        Route::delete('{id}', [UsersController::class, 'destroy'])->name('destroy');
    });

    // Products Routes
    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [ProductsController::class, 'index'])->name('index');
        Route::get('create', [ProductsController::class, 'create'])->name('create');
        Route::post('/', [ProductsController::class, 'store'])->name('store');
        Route::get('{id}/edit', [ProductsController::class, 'edit'])->name('edit');
        Route::put('{id}', [ProductsController::class, 'update'])->name('update');
        Route::delete('{id}', [ProductsController::class, 'destroy'])->name('destroy');
    });

    // Customers Routes
    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('/', [CustomersController::class, 'index'])->name('index');
        Route::get('create', [CustomersController::class, 'create'])->name('create');
        Route::post('/', [CustomersController::class, 'store'])->name('store');
        Route::get('{id}/edit', [CustomersController::class, 'edit'])->name('edit');
        Route::put('{id}', [CustomersController::class, 'update'])->name('update');
        Route::delete('{id}', [CustomersController::class, 'destroy'])->name('destroy');
    });
});

Route::group(['middleware' => ['auth', 'role:Cashier']], function () {
    // Transactions Routes
    Route::prefix('transaction')->name('transaction.')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('create', [TransactionController::class, 'create'])->name('create');
        Route::post('/', [TransactionController::class, 'store'])->name('store');
        Route::get('{id}', [TransactionController::class, 'show'])->name('show');
        Route::delete('{id}', [TransactionController::class, 'destroy'])->name('destroy');
    });
});

});

Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
