<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

Route::get('/', [FrontEndController::class, 'Index']);
Route::get('/register/account', [FrontEndController::class, 'RegisterAccount']);
Route::get('/login/account', [FrontEndController::class, 'LoginAccount']);
