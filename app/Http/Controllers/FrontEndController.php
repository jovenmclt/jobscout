<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Job_list;
use App\Models\Interview_questions;

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

        $get_joblist = Job_list::orderBy('created_at', 'desc')
                    ->simplePaginate(10);
        $get_jobcount = Job_list::all()
                    ->count();
        $get_availcount = Job_list::where('status', true)
                    ->count();
        $get_unavailcount = Job_list::where('status', false)
                    ->count();

        return Inertia::render('Index/AdminJobs',[
            'job_list' => $get_joblist,
            'job_count' => $get_jobcount,
            'job_avail' => $get_availcount,
            'job_unavail' => $get_unavailcount
        ]);
    }

    public function AdminCreateJob(){
        return Inertia::render('Index/AdminCreateJob');
    }

    public function AdminEditJob(Job_list $jobdata){

        $jobid = $jobdata->id;
        $job_interview = Interview_questions::where('job_id', $jobid)
                       ->get();
        return Inertia::render('Index/AdminEditJob', [
            'job_data' => $jobdata,
            'job_interview' => $job_interview
        ]);
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

