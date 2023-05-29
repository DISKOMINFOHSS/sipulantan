<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
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

Route::get('/', function () {
    // return view('welcome');
    return view('landing.home');
})->name('landing');

Route::name('auth.')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'show')->name('get.login');
        Route::post('/login', 'authenticate')->name('post.login');
    });

    Route::post('/logout', LogoutController::class)->name('post.logout');
});


Route::get('/products', function () {
    return view('landing.product.list');
});

Route::get('/products/{product}', function () {
    return view('landing.product.detail');
});

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:admin'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::name('admin.')->group(function () {
                Route::get('/dashboard', function () {
                    return view('admin.dashboard');
                })->name('dashboard');

                Route::resource('categories', CategoryController::class)->only([
                    'index', 'store', 'update', 'destroy'
                ]);

                Route::resource('sellers', SellerController::class)->only([
                    'index', 'store', 'show', 'update', 'destroy'
                ]);

                Route::resource('products', ProductController::class)->only([
                    'index', 'store', 'show', 'update', 'destroy'
                ]);
            });
        });
    });
});