<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/invoice/{order_id}', [OrderController::class, 'show'])->name('order.invoice');
