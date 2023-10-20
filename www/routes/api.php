<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RealtyItemsController;

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

Route::get('/realty-items', [RealtyItemsController::class, 'index'])->name('realty-items.index');

Route::get('/realty-items/count', [RealtyItemsController::class, 'count'])->name('realty-items.count');

Route::get('/realty-items/filters', [RealtyItemsController::class, 'filters'])->name('realty-items.filters');
