<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettlementController;
use App\Http\Controllers\SettlementOverviewController;
use App\Http\Controllers\TransactionOverviewController;
use App\Http\Controllers\TransactionPaymentController;
use App\Http\Controllers\Youtube\UserProfileController;
use App\Http\Controllers\Youtube\VideoController;
use App\Http\Controllers\Youtube\ViewsController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();


Route::post('/store', [HomeController::class, 'store'])->name('store');

Route::middleware(['auth'])->group(function () {

    Route::get('/transaction-payments', [TransactionPaymentController::class, 'index'])->name('transaction-payments');
    Route::post('/transaction-payments-store', [TransactionPaymentController::class, 'store'])->name('transaction-payments-store');
    Route::get('/transaction-payments-list', [TransactionPaymentController::class, 'list'])->name('transaction-payments-list');
    Route::get('/transaction-payments-edit/{id}', [TransactionPaymentController::class, 'edit'])->name('transaction-payments-edit');
    Route::post('/transaction-payments-update/{id}', [TransactionPaymentController::class, 'update'])->name('transaction-payments-update');
    Route::get('/transaction-payments-delete/{id}', [TransactionPaymentController::class, 'delete'])->name('transaction-payments-delete');

    Route::get('/transaction-overview', [TransactionOverviewController::class, 'index'])->name('transaction-overview');
    Route::post('/transaction-overview-store', [TransactionOverviewController::class, 'store'])->name('transaction-overview-store');


    Route::get('/settlement-payments', [SettlementController::class, 'index'])->name('settlement-payments');
    Route::post('/settlement-payments-store', [SettlementController::class, 'store'])->name('settlement-payments-store');
    Route::get('/settlement-payments-list', [SettlementController::class, 'list'])->name('settlement-payments-list');
    Route::get('/settlement-payments-edit/{id}', [SettlementController::class, 'edit'])->name('settlement-payments-edit');
    Route::post('/settlement-payments-update/{id}', [SettlementController::class, 'update'])->name('settlement-payments-update');
    Route::get('/settlement-payments-delete/{id}', [SettlementController::class, 'delete'])->name('settlement-payments-delete');

    Route::get('/settlement-overview', [SettlementOverviewController::class, 'index'])->name('settlement-overview');
    Route::post('/settlement-overview-store', [SettlementOverviewController::class, 'store'])->name('settlement-overview-store');

    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard-data-store', [DashboardController::class, 'store'])->name('dashboard-data-store');
    Route::get('/dashboard-data-list', [DashboardController::class, 'list'])->name('dashboard-data-list');
    Route::get('/dashboard-data-edit/{id}', [DashboardController::class, 'edit'])->name('dashboard-data-edit');
    Route::post('/dashboard-data-update/{id}', [DashboardController::class, 'update'])->name('dashboard-data-update');
    Route::get('/dashboard-data-delete/{id}', [DashboardController::class, 'delete'])->name('dashboard-data-delete');


    Route::group([
        'prefix' => 'youtube',
        'as' => 'youtube.'
    ], function () {

        Route::group([
            'prefix' => 'user-profiles',
            'as' => 'user-profiles.'
        ], function () {
            Route::get('/', [UserProfileController::class, 'index'])->name('index');
            Route::get('/create', [UserProfileController::class, 'create'])->name('create');
            Route::post('/', [UserProfileController::class, 'store'])->name('store');
            Route::get('/{id}', [UserProfileController::class, 'show'])->name('show');
            Route::get('/{user_profile}/edit', [UserProfileController::class, 'edit'])->name('edit');
            Route::post('/{id}', [UserProfileController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [UserProfileController::class, 'destroy'])->name('destroy');
        });

        
        Route::group([
            'prefix' => 'user-views',
            'as' => 'user-views.'
        ], function () {
            Route::get('/', [ViewsController::class, 'index'])->name('index');
            Route::get('/create', [ViewsController::class, 'create'])->name('create');
            Route::post('/', [ViewsController::class, 'store'])->name('store');
            Route::get('/{id}', [ViewsController::class, 'show'])->name('show');
            Route::get('/{user_profile}/edit', [ViewsController::class, 'edit'])->name('edit');
            Route::post('/{id}', [ViewsController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [ViewsController::class, 'destroy'])->name('destroy');
        });
        
        Route::group([
            'prefix' => 'user-videos',
            'as' => 'user-videos.'
        ], function () {
            Route::get('/', [VideoController::class, 'index'])->name('index');
            Route::get('/create', [VideoController::class, 'create'])->name('create');
            Route::post('/', [VideoController::class, 'store'])->name('store');
            Route::get('/{id}', [VideoController::class, 'show'])->name('show');
            Route::get('/{user_profile}/edit', [VideoController::class, 'edit'])->name('edit');
            Route::post('/{id}', [VideoController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [VideoController::class, 'destroy'])->name('destroy');
        });

    });
});
