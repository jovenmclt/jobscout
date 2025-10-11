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
use App\Models\Members_table;
use App\Models\Conversation_table;
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

        $curryear = date('Y');

        $get_members = Members_table::where('status', true)->whereYear('created_at', $curryear)->get();
        $get_applicant = Job_application::whereYear('created_at', $curryear)->get();

        $get_jobcount = Job_list::where('status', true)->count();
        $get_applicantcount = $get_applicant->count();
        $get_memberscount = $get_members->count();


        $get_processingapplication = Job_application::where('status', 'Processing')
                                ->with('userapplied', 'jobapplied')
                                ->simplePaginate(10);
        //dd($get_applicant);

        $get_admininfo = Auth::user();

        return Inertia::render('Index/AdminDashboard',[
            'jobcount' => $get_jobcount,
            'memberscount' => $get_memberscount,
            'applicantcount' => $get_applicantcount,
            'applicant' => $get_applicant,
            'members' => $get_members,
            'processing_applicants' => $get_processingapplication,
            'admin_info' => $get_admininfo
        ]);
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

        $get_members = Members_table::with('userinfo', 'jobinfo')->simplePaginate(10);

        $total_members = $get_members->count();

        $total_active = Members_table::where('status', '1')->count();

        $total_disabled = Members_table::where('status', '0')->count();

       // dd($total_disabled);

        return Inertia::render('Index/AdminMembers', [
            'all_members' => $get_members,
            'total_member' => $total_members,
            'total_active' => $total_active,
            'total_disabled' => $total_disabled
        ]);
    }

    public function AdminCreateMember(){
        $get_joblist = Job_list::all();

        return Inertia::render('Index/AdminCreateMember', [
            'Job_list' => $get_joblist,
        ]);
    }

    public function AdminViewMember($id){

        $get_userinfo = Members_table::where('id', $id)->with('userinfo', 'jobinfo', 'application')->first();

        $get_userid = $get_userinfo->userid;

        $get_applicationshistory = Job_application::where('user_id', $get_userid)->with('userapplied', 'jobapplied')->get();

        //dd($get_userapplications);


        return Inertia::render('Index/AdminViewMember', [
            'membersinfo' => $get_userinfo,
            'applicationhistory' => $get_applicationshistory
        ]);
    }

    public function AdminEditMember($id){

        $get_membersinfo = Members_table::where('id', $id)
                    ->with('userinfo', 'jobinfo')
                    ->first();

        //dd($get_membersinfo);

        $get_joblist = Job_list::all();

        return Inertia::render('Index/AdminEditMember', [
            'Job_list' => $get_joblist,
            'members_info' => $get_membersinfo
        ]);
    }

    public function AdminConversation(){

        $get_user = User::where('role', 'user')->get();

        return  Inertia::render('Index/AdminConversation',[
            'all_user' => $get_user
        ]);
    }

    public function AdminMessage($id){

        $get_message = Conversation_table::where('member_id', $id)->with('message')->get();

        $adminId = Auth::id();
        $user_info = User::where('id', $id)->first();

        return Inertia::render('Index/AdminMessage',[
            'message_history' => $get_message,
            'adminid' => $adminId,
            'user_info' => $user_info
        ]);


    }

    public function AdminSettings(){

        $get_user = User::where('role', 'user')->simplePaginate(10);

        return  Inertia::render('Index/AdminSettings', [
            'all_user' => $get_user
        ]);
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

        $check_usermember = Members_table::where('userid', $userid)
                        ->exists();

        $get_availjob = Job_list::where('status', true)
                    ->get();

        $check_userinfo = User::where('id', $userid)
                        ->whereNotNull('experience')->where('experience', '!=', '')
                        ->whereNotNull('about')->where('about', '!=', '')
                        ->whereNotNull('gender')->where('gender', '!=', '')
                        ->whereNotNull('education')->where('education', '!=', '')
                        ->whereNotNull('age')->where('age', '!=', '')
                        ->whereNotNull('location')->where('location', '!=', '')
                        ->exists();
        //dd($check_userinfo);
        return Inertia::render('Index/UserJobs', [
            'job_available' => $get_availjob,
            'check_usermember' => $check_usermember,
            'check_userinfo' => $check_userinfo
        ]);
    }

    public function UserJobsDetails(Job_list $jobdata){

        //dd($check_userinfo);
        $get_qualification = Job_qualification::where('jobid', $jobdata->id)->get();

        return Inertia::render('Index/UserJobsDetails', [
            'job_details' => $jobdata,
            'job_qualification' => $get_qualification,
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
        $get_memberinfo = Members_table::where('userid', $get_userinfo->id)
                        ->first();

        return Inertia::render('Index/UserProfile', [
            'userinfo' => $get_userinfo,
            'memberinfo' => $get_memberinfo
        ]);
    }

    public function UserMessage(){

        $user_id = Auth::id();

        $get_message = Conversation_table::where('member_id', $user_id)->with('message')->get();

        //dd($get_message);

        return Inertia::render('Index/UserMessage',[
            'message_history' => $get_message,
            'userid' => $user_id
        ]);
    }
}

