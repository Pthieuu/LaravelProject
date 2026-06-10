<?php

use App\Http\Controllers\ActionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ActionController::class, 'index'])->name('actions.index');
Route::post('/actions', [ActionController::class, 'store'])->name('actions.store');
Route::patch('/actions/{action}/status', [ActionController::class, 'updateStatus'])->name('actions.status');
Route::delete('/actions/{action}', [ActionController::class, 'destroy'])->name('actions.destroy');
