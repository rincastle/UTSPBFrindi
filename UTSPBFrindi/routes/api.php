<?php
use App\Http\Controllers\authController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\googleController;

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

ROUTE::post('/login',[authController::class,'login']);
ROUTE::post('/register',[registerController::class,'register']);

ROUTE::get('/oauth/register',[googleController::class,'redirect']);
ROUTE::get('/oauth/google/callback',[googleController::class,'callback']);

ROUTE::middleware(['userMiddleware'])->group(function(){

    Route::post('/products',[productsController::class,'create']);
    Route::get('/products',[productsController::class,'read']);
    Route::put('/products/{id}',[productsController::class,'update']);
    Route::delete('/products/{id}',[productsController::class,'delete']);




});

ROUTE::middleware(['adminMiddleware'])->group(function(){

    ROUTE::post('/categories',[categoriesController::class,'create']);
    Route::get('/categories',[categoriesController::class,'read']);
    Route::put('/categories/{id}',[categoriesController::class,'update']);
    Route::delete('/categories/{id}',[categoriesController::class,'delete']);


});
