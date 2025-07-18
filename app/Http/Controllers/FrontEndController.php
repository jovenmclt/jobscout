<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    // Landing Page

    public function index(){
        return Inertia::render('Index/Index');
    }

    public function RegisterPage(){
        return Inertia::render('Index/RegisterAccount');
    }

    public function LoginPage(){
        return Inertia::render('Index/LoginAccount');
    }

    // Admin

    public function AdminDashboard(){
        return Inertia::render('Index/AdminDashboard');
    }

    public function AdminJobs(){
        return Inertia::render('Index/AdminJobs');
    }

    public function AdminCreateJob(){
        return Inertia::render('Index/AdminCreateJob');
    }

    public function AdminEditJob(){
        return Inertia::render('Index/AdminEditJob');
    }

    public function AdminApplication(){
        return Inertia::render('Index/AdminApplication');
    }

    public function AdminViewApp(){
        return Inertia::render('Index/AdminViewApplication');
    }

    public function AdminMembers(){
        return Inertia::render('Index/AdminMembers');
    }

    public function AdminCreateMember(){
        return Inertia::render('Index/AdminCreateMember');
    }

    public function AdminEditMember(){
        return Inertia::render('Index/AdminEditMember');
    }

    public function AdminViewMember(){
        return Inertia::render('Index/AdminViewMember');
    }


    // User

    public function UserDashboard(){
        return Inertia::render('Index/UserDashboard');
    }

    public function UserJobs(){
        return Inertia::render('Index/UserJobs');
    }

    public function UserJobsDetails(){
        return Inertia::render('Index/UserJobsDetails');
    }

    public function UserJobsInterview(){
        return Inertia::render('Index/UserJobsInterview');
    }

    public function UserApplicationStats(){
        return Inertia::render('Index/UserApplicationStats');
    }

    public function UserViewApplication(){
        return Inertia::render('Index/UserViewApplication');
    }

    public function UserProfile(){
        return Inertia::render('Index/UserProfile');
    }
}

