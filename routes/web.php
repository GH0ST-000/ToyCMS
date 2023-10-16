<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->group(function (){
    Route::controller(AdminController::class)->group(function (){
        Route::get('/dashboard','index')->name('admin/dashboard');
        Route::get('/logout','logout')->name('admin/logout');
    });
    Route::controller(AdminProductController::class)->group(function (){
        Route::get('/product','product')->name('admin/product');
        Route::get('/add_product','add_new_product')->name('admin/add_product');
        Route::post('/store_product','store_product')->name('admin/store_product');
        Route::get('/delete_product/{id}','destroy')->name('admin/delete_product');
        Route::get('/edit_product/{id}','show')->name('admin/edit_product');
        Route::post('/update_product/{id}','UpdateProduct')->name('admin/update_product');
    });
});

require __DIR__.'/auth.php';
