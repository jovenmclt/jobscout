<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;

Route::get('/', [FrontEndController::class, 'Index']);
Route::get('/register/account', [FrontEndController::class, 'RegisterPage']);
Route::get('/login/account', [FrontEndController::class, 'LoginPage']);

// user
Route::get('/user/dashboard', [FrontEndController::class, 'UserDashboard']);
Route::get('/user/jobs', [FrontEndController::class, 'UserJobs']);
Route::get('/user/jobs/details', [FrontEndController::class, 'UserJobsDetails']);
Route::get('/user/jobs/interview', [FrontEndController::class, 'UserJobsInterview']);
Route::get('/user/applicationstats', [FrontEndController::class, 'UserApplicationStats']);
Route::get('/user/view/application', [FrontEndController::class, 'UserViewApplication']);
Route::get('/user/profile', [FrontEndController::class, 'UserProfile']);


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
