<?php

//define route namespace
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Bill\BillController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Sales\SaleController;
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

//for Purchase
Route::get('/purchase', [PurchaseController::class, 'index']);
Route::get('/purchase_products/{id}', [PurchaseController::class, 'purchase_products']);
Route::post('/purchase/store', [PurchaseController::class, 'store']);
Route::get('/sales_customer_products/{id}', [PurchaseController::class, 'sales_customer_products']);

//for Sales
Route::get('/sales', [SaleController::class, 'index']);
Route::get('/sales_products/{id}', [SaleController::class, 'sales_products']);
Route::post('/sales/store', [SaleController::class, 'store']);

Route::get('/bills', [BillController::class, 'index']);
Route::get('/bills_products/{id}', [BillController::class, 'sales_products']);
Route::post('/bills/store', [BillController::class, 'store']);

