<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\ProductController;
  
Route::get('/', ProductController::class.'@index')->name('products.index');
Route::get('products/search', [ProductController::class, 'search'])->name('products.search');

  
Route::resource('products', ProductController::class);