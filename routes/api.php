<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\VerificationController;

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

// Forgot Password Routes
Route::post('/password/send-reset-link', [ResetPasswordController::class, 'sendResetLinkEmail']);
Route::post('/password/reset', [ResetPasswordController::class, 'resetPassword']);


// Account Verification Routes
Route::get('/email/verify/{token}', [VerificationController::class, 'verify'])
    ->where('token', '^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[1-5][0-9a-fA-F]{3}-[89abAB][0-9a-fA-F]{3}-[0-9a-fA-F]{12}$')
    ->name('verification.verify');

// Accessible only to authenticated users
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Account Verification Routes
    Route::get('/email/verify/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    // Returns the currently authenticated user
    Route::get('/me', function (Request $request) {
        return $request->user();
    });
    // Logout the currently authenticated user
    Route::post('/logout',   [AuthController::class, 'logout']);

    // Accesssible only to users in the organization
    Route::prefix('organizations/{orgUuid}')->middleware([
        'user.in.organization', 'email.verified'
    ])->group(function () {
        // Products endpoints
        Route::apiResource('/products', ProductController::class)->parameters([
            'products' => 'uuid', // Change the route parameter name since we change the model binding to 'uuid'
        ])->middleware('belongs.to.organization:Product');

        // Categories endpoints
        Route::apiResource('/categories', CategoryController::class)->parameters([
            'categories' => 'uuid', // Change the route parameter name since we change the model binding to 'uuid'
        ])->middleware('belongs.to.organization:Category');

        // Units endpoints
        Route::apiResource('/units', UnitController::class)->parameters([
            'units' => 'uuid', // Change the route parameter name since we change the model binding to 'uuid'
        ])->middleware('belongs.to.organization:Unit');

        // Customers endpoints
        Route::apiResource('/customers', CustomerController::class)->parameters([
            'customers' => 'uuid', // Change the route parameter name since we change the model binding to 'uuid'
        ])->middleware('belongs.to.organization:Customer');


        // Customers endpoints
        Route::apiResource('/invoices', InvoiceController::class)->parameters([
            'invoices' => 'uuid', // Change the route parameter name since we change the model binding to 'uuid'
        ])->middleware('belongs.to.organization:Invoice');
    });
});
