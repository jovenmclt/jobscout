<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Job_list;
use Illuminate\Http\Request;
use App\Models\Job_application;
use App\Models\Interview_answers;
use App\Models\job_qualification;
use App\Models\Interview_questions;
use Illuminate\Support\Facades\Auth;

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

        $job_qualification = job_qualification::where('jobid', $jobid)
                       ->get();

        return Inertia::render('Index/AdminEditJob', [
            'job_data' => $jobdata,
            'job_interview' => $job_interview,
            'job_qualification' => $job_qualification
        ]);
    }

    public function AdminApplication(){

        $get_userid = User::all()->pluck('id');

        $get_application = Job_application::where('status', '!=', 'Cancelled')
                        ->whereIn('user_id', $get_userid)
                        ->with('jobapplied', 'userapplied')
                        ->simplePaginate(10);

        $get_totalapplicants = Job_application::all()
                        ->count();

        $get_processing = Job_application::where('status', 'Processing')
                        ->count();

        $get_passed = Job_application::where('status', 'Hired')
                        ->count();

        $get_rejected = Job_application::where('status', 'Rejected')
                        ->count();

        return Inertia::render('Index/AdminApplication', [
            'application_list' => $get_application,
            'total_application' => $get_totalapplicants,
            'processing_application' => $get_processing,
            'passed_application' => $get_passed,
            'rejected_application' => $get_rejected
        ]);
    }

    public function AdminViewApp($id){

        $application_info = Job_application::where('id', $id)
                ->with('userapplied', 'jobapplied')
                ->first();

        $interview_info = Interview_answers::where('application_id', $id)
                ->with('jobquestion')
                ->get();

        return Inertia::render('Index/AdminViewApplication', [
            'application_info' => $application_info,
            'interview_info' => $interview_info
        ]);
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

        $get_auth = Auth::user();

        $get_totalapplied = Job_application::where('user_id', $get_auth->id)->count();
        $get_passed = Job_application::where('user_id', $get_auth->id)->where('status', 'Hired')->count();
        $get_rejected = Job_application::where('user_id', $get_auth->id)->where('status', 'Rejected')->count();

        $get_application_job = Job_application::where('user_id', $get_auth->id)->with('jobapplied')
                            ->simplePaginate(10);

        return Inertia::render('Index/UserDashboard',[
            'user_data' => $get_auth,
            'Job_passed' => $get_passed,
            'job_rejected' => $get_rejected,
            'job_applied' => $get_totalapplied,
            'application_job' => $get_application_job
        ]);
    }

    public function UserJobs(){

        $userid = Auth::id();
        $appliedJobIds = Job_application::where('user_id', $userid)
                    ->pluck('job_id');

        $get_availjob = Job_list::where('status', true)
                    ->whereNotIn('id', $appliedJobIds)
                    ->get();

        return Inertia::render('Index/UserJobs', [
            'job_available' => $get_availjob
        ]);
    }

    public function UserJobsDetails(Job_list $jobdata){

        $get_qualification = Job_qualification::where('jobid', $jobdata->id)->get();

        return Inertia::render('Index/UserJobsDetails', [
            'job_details' => $jobdata,
            'job_qualification' => $get_qualification
        ]);
    }

    public function UserJobsInterview(Job_list $jobdata){

        $get_interview = Interview_questions::where('job_id', $jobdata->id)->get();

        return Inertia::render('Index/UserJobsInterview',[
            'job_data' => $jobdata,
            'interview_question' => $get_interview
        ]);
    }

    public function UserApplicationStats(){

        $get_authid = Auth::id();
        $get_totalapplied = Job_application::where('user_id', $get_authid)->count();
        $get_passed = Job_application::where('user_id', $get_authid)->where('status', 'Hired')->count();
        $get_rejected = Job_application::where('user_id', $get_authid)->where('status', 'Rejected')->count();

        $get_application_job = Job_application::where('user_id', $get_authid)->with('jobapplied')
                            ->simplePaginate(10);

        return Inertia::render('Index/UserApplicationStats', [
            'application_job' => $get_application_job,
            'totalapplied' => $get_totalapplied,
            'totalpassed' => $get_passed,
            'totalrejected' => $get_rejected
        ]);
    }

    public function UserViewApplication(Job_list $jobdata){

        $auth_id = Auth::id();
        $job_qualification = Job_qualification::where('jobid', $jobdata->id)->get();

        $applicant = Job_application::where('user_id', $auth_id)->where('job_id', $jobdata->id)->first();
        $applicant_interview = Interview_answers::where('application_id', $applicant->id)->with('jobquestion')->get();

        return Inertia::render('Index/UserViewApplication', [
            'job_details' => $jobdata,
            'job_qualification' => $job_qualification,
            'applicant' => $applicant,
            'applicant_interview' => $applicant_interview
        ]);
    }

    public function UserProfile(){

        $get_userinfo = Auth::user();

        return Inertia::render('Index/UserProfile', [
            'userinfo' => $get_userinfo
        ]);
    }
}

