<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ViewCatagoriController;
use App\Http\Controllers\AddCatagoriController;

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

Route::get('/',[HomeController::class,'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect']);
#catagori
Route::get('view_catagori',[ViewCatagoriController::class,'view_catagori']);
Route::post('add_catagory',[AddCatagoriController::class,'add_catagory']);

Route::get('deleterd_catagory/{id}',[AddCatagoriController::class,'deleterd_catagory']);

#add_product
Route::get('/add_product',[AddCatagoriController::class,'add_product']);

Route::post('add_view_products',[AddCatagoriController::class,'add_view_products']);
#show_product
Route::get('/show_product',[AddCatagoriController::class,'show_product']);

#deleted_produc
Route::get('/deleted_produc/{id}',[AddCatagoriController::class,'deleted_produc']);
#update_products
Route::get('/update_products/{id}',[AddCatagoriController::class,'update_products']);
#update_product_edit
Route::post('update_product_edit/{id}',[AddCatagoriController::class,'update_product_edit']);
