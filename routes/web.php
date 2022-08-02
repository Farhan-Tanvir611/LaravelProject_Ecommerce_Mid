<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
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
Route::get('/register',[CustomerController::class,'signup'])->name('signup');
Route::post('/register',[CustomerController::class,'signupValidate'])->name('signup.ok');

Route::get('/login',[CustomerController::class,'login'])->name('loginpage');
Route::post('/login',[CustomerController::class,'loginSubmit'])->name('loginpage.ok');

Route::get('/dashboard',[CustomerController::class,'dashboard'])->name('dashboard')->middleware('logged.user');

Route::get('/product',[ProductController::class,'addproduct'])->name('product.addproduct');

Route::get('/list',[ProductController::class,'view'])->name('productdetails');

Route::get('/add_to_cart',[CustomerController::class,'addtocart'])->name('add_to_cart');
Route::post('/add_to_cart',[CustomerController::class,'addtocart'])->name('add_to_cart.ok');

Route::get('/cart',[CustomerController::class,'cartitem'])->name('cart');

Route::get('delete/{id}',[CustomerController::class,'destroy']);

Route::get('/EditProduct',[CustomerController::class,'confirmorderr'])->name('product.EditProduct');
Route::post('/EditProduct',[CustomerController::class,'confirmorderr'])->name('product.EditProduct');
//Route::put('/UpdateProduct/{id}',[CustomerController::class,'update'])->name('product.UpdateProduct');


Route::get('/sellerregister',[SellerController::class,'signup'])->name('sellersignup');
Route::post('/sellerregister',[SellerController::class,'signupValidate'])->name('sellersignup.ok');

Route::get('/sellerlogin',[SellerController::class,'login'])->name('sellerloginpage');
Route::post('/sellerlogin',[SellerController::class,'loginSubmit'])->name('sellerloginpage.ok');

//Route::get('/sellerdashboard',[SellerController::class,'dashboard'])->name('sellerdashboard')->middleware('logged.user');

Route::get('/addproduct',[SellerController::class,'createproduct'])->name('createproduct');

Route::post('/addproduct',[SellerController::class,'productSubmit'])->name('createproduct.submit');

//Route::get('/EditProduct',[SellerController::class,'confirmorderr'])->name('product.EditProduct');
//Route::post('/EditProduct',[SellerController::class,'confirmorderr'])->name('product.EditProduct');

Route::get('/sellerlist',[SellerController::class,'view'])->name('sellerproductdetails')->middleware('logged.user');;

Route::get('/allorder',[SellerController::class,'everyorder'])->name('allorder');

Route::get('delete/{id}',[SellerController::class,'delivered']);



Route::get('/search',[ProductController::class,'search']);


Route::get('/logout',function(){
    session()->forget('logged');
    session()->flash('msg','Sucessfully Logged out');
    return redirect()->route('productdetails');
})->name('logout');