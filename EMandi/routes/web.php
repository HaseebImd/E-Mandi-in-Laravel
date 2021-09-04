<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product_Controller;
use App\Http\Controllers\CustomerController;


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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get("/",[Product_Controller::class,'home']);
Route::get("/products",[Product_Controller::class,'products']);
Route::get("/cart",[Product_Controller::class,'cart']);
Route::get("/checkout",[Product_Controller::class,'checkout']);
Route::get('addproduct',[Product_Controller::class,'addproduct']);
Route::post('saveproduct',[Product_Controller::class,'saveproduct']);
Route::get('/detailpage/{id}',[Product_Controller::class,'detailpage']);
Route::post("add_to_cart",[Product_Controller::class,'addToCart']);
Route::get("cart",[Product_Controller::class,'cartList']);
Route::get("removecart/{id}",[Product_Controller::class,'removeCart']);
Route::get("checkout",[Product_Controller::class,'checkout']);
Route::get("products",[Product_Controller::class,'products']);
Route::post("orderplace",[Product_Controller::class,'orderPlace']);
Route::get('search',[Product_Controller::class,'search']);



Route::get("/login",[CustomerController::class,'login']);
Route::get("/signup",[CustomerController::class,'signup']);
Route::post("create_account",[CustomerController::class,'create_account']);
Route::post("/user_login",[CustomerController::class,'user_login']);
Route::get("orders",[CustomerController::class,'Orders']);
Route::get('edituser/{id}',[CustomerController::class,'edituser']);
Route::post('/edituser/save_edituser',[CustomerController::class,'save_edituser']);



Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});