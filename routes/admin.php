<?php

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\UserController;
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

Route::prefix('admin')->group(function(){



//     banner
    Route::get('/add-banner', function () {
        return view('admin.add-banner');
    })->name('admin.add-banner');

    Route::post('/add-banner', function () {
        return view('admin.list-banner');
    });


    Route::get('/list-banner', function () {
        return view('admin.list-banner');
    })->name('admin.list-banner');




//    Route::get('/add-product', function () {
//        return view('admin.add-product');
//    })->name('admin.add-product');
//
//    Route::get('/list-product', function () {
//        return view('admin.list-product');
//    })->name('admin.list-product');

    // color
    Route::get('/add-color', function () {
        return view('admin.add-color');
    })->name('admin.add-color');

    Route::get('/list-color', function () {
        return view('admin.list-color');
    })->name('admin.list-color');

    // user


    // comment
    Route::get('/add-comment', function () {
        return view('admin.add-comment');
    })->name('admin.add-comment');

    Route::get('/list-comment', function () {
        return view('admin.list-comment');
    })->name('admin.list-comment');

    // order
    Route::get('/add-order', function () {
        return view('admin.add-order');
    })->name('admin.add-order');

    Route::get('/list-order', function () {
        return view('admin.list-order');
    })->name('admin.list-order');

    Route::get('/register', [HomeController::class, 'register'])->name('admin.register');
    Route::post('/register', [HomeController::class, 'registerPost'])->name('admin.registerPost');

    Route::get('/login', [HomeController::class, 'login'])->name('admin.login');
    Route::post('/login', [HomeController::class, 'loginPost'])->name('admin.loginPost');

    Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

    Route::get('/error', [HomeController::class, 'error'])->name('admin.error');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function (){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // product
    Route::resources([
        'product' => ProductController::class,
        'blog'=> BlogController::class,
        'brand'=> BrandController::class,
        'role'=> RoleController::class,
        'user'=> UserController::class,
    ]);

    // category
    Route::get('/add-category', [CategoryController::class, 'add'])->name('add-category');
    Route::post('/add-category', [CategoryController::class, 'create']);
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
    Route::post('/edit-category/{id}', [CategoryController::class, 'update'])->name('update-category');
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->name('delete-category');
    Route::get('/list-category', [CategoryController::class, 'index'])->name('list-category');

});




