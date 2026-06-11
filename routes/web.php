<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Public welcome page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard redirects to the database-free product demo.
Route::get('/dashboard', function () {
    return redirect('/products');
})->name('dashboard');

Route::resource('products', ProductController::class);
