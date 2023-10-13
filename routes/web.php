<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->group(function (){
    Route::controller(AdminController::class)->group(function (){
        Route::get('/dashboard','index')->name('admin/dashboard');
        Route::get('/product','product')->name('admin/product');
        Route::get('/add_product','add_new_product')->name('admin/add_product');
        Route::get('/store_product','store_product')->name('admin/store_product');
    });
});

require __DIR__.'/auth.php';
