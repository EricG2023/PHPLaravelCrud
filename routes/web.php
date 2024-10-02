<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::resource("products", ProductController::class)->only("index","show");

/*
Route::get("/product", function () {
    $products = Product::all();
    return view("product", ["products"=> $products]);
});
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Required to be authenticated.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['can:viewAny, App\Models\Product'])->group(function() {
    Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource("products", AdminProductController::class);
    });
});
});

require __DIR__.'/auth.php';
