<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('user', [UserController::class,'getUser']);
Route::post('create-user', [UserController::class,'createUser']);
Route::delete('user/{id}', [UserController::class,'deleteId']);
Route::put('user/{id}', [UserController::class,'updateUser']);
Route::post('create-customer', [UserController::class,'createCustomer']);
Route::put('Customer-update/{id}', [UserController::class,'updateCustomer']);
Route::get('createCategory', [UserController::class,'createCAtegory']);
Route::post('AddCreateCategory', [UserController::class,'AddCreateCAtegory']);
Route::delete('DeleteCategory/{id}', [UserController::class,'DeleteCategory']);
Route::get('Category', [UserController::class,'GetCategory']);
Route::put('UpdateCategory/{id}', [UserController::class,'UpdateCategory']);
Route::post('AddProduct',[UserController::class,'AddProduct']);
Route::get('Product', [UserController::class,'GetProduct']);
Route::get('ProductCategory/{id}', [UserController::class,'GetProductCategory']);






