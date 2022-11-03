<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

// ----if-user-has-logged-in----

Route::group(['middleware' => 'auth'],function(){
Route::get('/add_category', [AuthController::class, 'add_category']);
Route::post('/add_category', [AuthController::class, 'add_category_form']);
Route::get('/add_product', [AuthController::class, 'add_product']);
Route::post('/add_product', [AuthController::class, 'add_product_form']);
Route::get('/add_to_cart_display/{id}', [AuthController::class, 'add_to_cart_display']);
Route::post('/add_to_cart_form', [AuthController::class, 'add_to_cart_form']);
Route::get('/my_cart', [AuthController::class, 'my_cart']);
Route::get('/delete-cart/{id}', [AuthController::class, 'delete_cart']);

Route::get('/logout', [AuthController::class, 'logout']);
});

// ----if-user-has-not-logged-in----

Route::get('/home', [AuthController::class, 'home_view']);
Route::get('/error', [AuthController::class, 'error']);
Route::get('/all_products', [AuthController::class, 'all_product']);
Route::get('/search_categogy/{id}', [AuthController::class, 'search_categogy']);
Route::get('/search_cart/{id}', [AuthController::class, 'search_cart']);
Route::get('/login', [AuthController::class, 'login_view']);
Route::post('/login', [AuthController::class, 'login_form']);
Route::post('/register', [AuthController::class, 'register_form']);
Route::get('/special', [AuthController::class, 'special_view']);
Route::get('/contact', [AuthController::class, 'contact_view']);
