<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products',ProductController::class);
Route::prefix('products')->group( function (){
    Route::get('stock/{product}',[ProductController::class,'viewSupply'])->name('products.viewSupply');
    Route::put('stock/{product}',[ProductController::class,'supply'])->name('products.supply');
});

Route::resource('sales', SalesController::class)->only(['index','store']);
Route::prefix('reports')->group(function () {
    Route::get('stockReport',[ReportController::class,'stockReport']);
    Route::get('mostProductsSold',[ReportController::class,'mostProductsSold']);
});