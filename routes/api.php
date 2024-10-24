<?php

use App\Http\Controllers\ActivityLogController\ActivityLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Bill\BillController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Calculate\CalculateController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\CartItem\CartItemController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Expense\ExpenseCategoryController;
use App\Http\Controllers\Expense\ExpenseController;
use App\Http\Controllers\Investment\InvestmentController;
use App\Http\Controllers\PaymentType\PaymentTypeController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Reserve\ReserveController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Serial\SerialController;
use App\Http\Controllers\Stock\StockController;
use App\Http\Controllers\Supplier\SupplierController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
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
Route::get('/company', [CompanyController::class, 'index']);
Route::get('/user_allcompany/{id}', [CompanyController::class, 'user_allcompany']);
Route::get('/user_company_find/{id}', [CompanyController::class, 'user_company_find']);
Route::post('/company_store', [CompanyController::class, 'store']);
