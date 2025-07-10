<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

Route::get('/', [FrontEndController::class, 'Index']);
Route::get('/register/account', [FrontEndController::class, 'RegisterPage']);
Route::get('/login/account', [FrontEndController::class, 'LoginPage']);


// admin
Route::get('/admin/dashboard', [FrontEndController::class, 'AdminDashboard']);
