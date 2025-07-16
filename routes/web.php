<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

Route::get('/', [FrontEndController::class, 'Index']);
Route::get('/register/account', [FrontEndController::class, 'RegisterPage']);
Route::get('/login/account', [FrontEndController::class, 'LoginPage']);


// admin
Route::get('/admin/dashboard', [FrontEndController::class, 'AdminDashboard']);
Route::get('/admin/jobs', [FrontEndController::class, 'AdminJobs']);
Route::get('/admin/jobs/create', [FrontEndController::class, 'AdminCreateJob']);
Route::get('/admin/jobs/edit', [FrontEndController::class, 'AdminEditJob']);
Route::get('/admin/application', [FrontEndController::class, 'AdminApplication']);
Route::get('/admin/application/view', [FrontEndController::class, 'AdminViewApp']);
Route::get('/admin/members', [FrontEndController::class, 'AdminMembers']);
Route::get('/admin/members/create', [FrontEndController::class, 'AdminCreateMember']);
Route::get('/admin/members/edit', [FrontEndController::class, 'AdminEditMember']);
Route::get('/admin/members/view', [FrontEndController::class, 'AdminViewMember']);
