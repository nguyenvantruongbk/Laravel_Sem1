<?php

use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class, "homepage"]);
Route::get("/about-us",[HomeController::class,"about_us"]);

Route::get("/category/{category:slug}",[HomeController::class,"category"]);

Route::get("/product/{id}",[HomeController::class,"product"]);

Route::get("/search",[HomeController::class,"search"]);
Route::post("/add-to-cart/{id}",[HomeController::class,"addToCart"]);