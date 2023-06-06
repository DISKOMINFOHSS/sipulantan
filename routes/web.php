<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SellerController as AdminSellerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('landing');

Route::name('auth.')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'show')->name('get.login');
        Route::post('/login', 'authenticate')->name('post.login');
    });

    Route::post('/logout', LogoutController::class)->name('post.logout');
});


Route::name('products.')->group(function () {
    Route::prefix('products')->group(function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/search', 'search')->name('search');
            Route::get('/{product}', 'show')->name('show');
        });
    });

});

Route::get('/sellers/{seller}', SellerController::class)->name('sellers.show');
Route::get('/categories/{category?}', CategoryController::class)->name('categories.show');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:admin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::name('admin.')->group(function () {
                Route::get('/dashboard', function () {
                    return view('admin.dashboard');
                })->name('dashboard');

                Route::resource('categories', AdminCategoryController::class)->only([
                    'index', 'store', 'update', 'destroy'
                ]);

                Route::resource('sellers', AdminSellerController::class)->only([
                    'index', 'store', 'show', 'update', 'destroy'
                ]);

                Route::get('sellers/{seller?}/products/create', function (string $seller = null) {
                    return redirect('/admin/products/create')->with('seller_id', $seller);
                })->name('sellers.products.create');

                Route::resource('products', AdminProductController::class);
            });
        });
    });
});