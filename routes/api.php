<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;

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

// Create a new tenant user under a new organization
Route::post('/register', [AuthController::class, 'register']);
// Logs in a user
Route::post('/login', [AuthController::class, 'login']);

// Accessible only to authenticated users
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Returns the currently authenticated user
    Route::get('/me', function (Request $request) {
        return $request->user();
    });
    // Logout the currently authenticated user
    Route::post('/logout',   [AuthController::class, 'logout']);

    // Accesssible only to users in the organization
    Route::prefix('organizations/{orgUuid}')->middleware('user.in.organization')->group(function () {
        // Products endpoints
        Route::apiResource('/products', ProductController::class)->only([
            'index', 'show', 'store', 'update', 'destroy'
        ])->parameters([
            'products' => 'uuid', // Change the route parameter name since we change the model binding to 'uuid'
        ])->middleware('belongs.to.organization:Product');

        // Categories endpoints
        Route::apiResource('/categories', CategoryController::class)->only([
            'index', 'show', 'store', 'update', 'destroy'
        ])->parameters([
            'categories' => 'uuid', // Change the route parameter name since we change the model binding to 'uuid'
        ])->middleware('belongs.to.organization:Category');

        // Units endpoints
        Route::apiResource('/units', UnitController::class)->only([
            'index', 'show', 'store', 'update', 'destroy'
        ])->parameters([
            'units' => 'uuid', // Change the route parameter name since we change the model binding to 'uuid'
        ])->middleware('belongs.to.organization:Unit');

        // Customers endpoints
        Route::apiResource('/customers', CustomerController::class)->only([
            'index', 'show', 'store', 'update', 'destroy'
        ])->parameters([
            'customers' => 'uuid', // Change the route parameter name since we change the model binding to 'uuid'
        ])->middleware('belongs.to.organization:Customer');
    });
});
