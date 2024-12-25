<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettlementController;
use App\Http\Controllers\SettlementOverviewController;
use App\Http\Controllers\TransactionOverviewController;
use App\Http\Controllers\TransactionPaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/settlement-payments-listing', [SettlementController::class, 'listing']);
Route::get('/settlement-overview-listing', [SettlementOverviewController::class, 'listing']);

Route::get('/transaction-payments-listing', [TransactionPaymentController::class, 'listing']);
Route::get('/transaction-overview-listing', [TransactionOverviewController::class, 'listing']);
Route::get('/dashboard-data-listing', [DashboardController::class, 'listing']);
