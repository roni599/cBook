<?php

//define route namespace
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Supplier\SupplierController;
use Illuminate\Support\Facades\Route;

//for user create,login and other things
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('send_otp', [AuthController::class, 'sendOTP']);
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
});

//for Company
Route::get('/company', [CompanyController::class, 'index']);
Route::get('/user_allcompany/{id}', [CompanyController::class, 'user_allcompany']);
Route::get('/user_company_find/{id}', [CompanyController::class, 'user_company_find']);
Route::post('/company_store', [CompanyController::class, 'store']);

//for Customer
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/company_customer/{id}', [CustomerController::class, 'company_customer']);
Route::post('/customer/store', [CustomerController::class, 'store']);

//for Supplier
Route::get('/supplier', [SupplierController::class, 'index']);
Route::get('/company_supplier/{id}', [SupplierController::class, 'company_supplier']);
Route::post('/supplier/store', [SupplierController::class, 'store']);

//for Products
Route::get('/products', [ProductController::class, 'index']);
Route::get('/company_products/{id}', [ProductController::class, 'company_products']);
Route::post('/product/store', [ProductController::class, 'store']);

Route::get('/purchase', [PurchaseController::class, 'index']);
Route::post('/purchase/store', [PurchaseController::class, 'store']);
