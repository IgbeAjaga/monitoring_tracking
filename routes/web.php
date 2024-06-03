<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\ProductController;
  
Route::get('/', ProductController::class.'@index')->name('products.index');
Route::get('products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('products/export', [ProductController::class, 'export'])->name('products.export');

  
Route::resource('products', ProductController::class);