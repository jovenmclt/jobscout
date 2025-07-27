<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobListController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ApplicationController;

Route::get('/', [FrontEndController::class, 'Index']);
Route::get('/register/account', [FrontEndController::class, 'RegisterPage']);
Route::get('/login/account', [FrontEndController::class, 'LoginPage'])->name('login');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [FrontEndController::class, 'UserDashboard'])->name('userdashboard');
    Route::get('/user/jobs', [FrontEndController::class, 'UserJobs']);
    Route::get('/job/details/{jobdata}', [FrontEndController::class, 'UserJobsDetails']);
    Route::get('/job/interview/{jobdata}', [FrontEndController::class, 'UserJobsInterview']);
    Route::get('/user/applicationstats', [FrontEndController::class, 'UserApplicationStats']);
    Route::get('/user/view/application', [FrontEndController::class, 'UserViewApplication']);
    Route::get('/user/profile', [FrontEndController::class, 'UserProfile']);

    // actions
    Route::post('/submitapplication', [ApplicationController::class, 'Application']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [FrontEndController::class, 'AdminDashboard'])->name('admindashboard');
    Route::get('/admin/jobs', [FrontEndController::class, 'AdminJobs'])->name('jobpage');
    Route::get('/admin/jobs/create', [FrontEndController::class, 'AdminCreateJob']);
    Route::get('/admin/jobs/edit/{jobdata}', [FrontEndController::class, 'AdminEditJob']);
    Route::get('/admin/application', [FrontEndController::class, 'AdminApplication']);
    Route::get('/admin/application/view', [FrontEndController::class, 'AdminViewApp']);
    Route::get('/admin/members', [FrontEndController::class, 'AdminMembers']);
    Route::get('/admin/members/create', [FrontEndController::class, 'AdminCreateMember']);
    Route::get('/admin/members/edit', [FrontEndController::class, 'AdminEditMember']);
    Route::get('/admin/members/view', [FrontEndController::class, 'AdminViewMember']);

    // actions
    Route::post('/createnewjob', [JobListController::class, 'CreateNewJob']);
    Route::post('/editjob/{jobupdateID}', [JobListController::class, 'EditJob']);
    Route::post('/deletejob/{jobdeleteID}', [JobListController::class, 'DeleteJob']);
});

Route::post('/registeraccount', [AuthController::class, 'RegisterAccount']);
Route::post('/loginaccount', [AuthController::class, 'LoginAccount']);
Route::post('/logoutaccount', [AuthController::class, 'LogoutAccount']);
