<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Job_list;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Members_table;
use App\Models\Message_table;
use App\Models\Job_application;
use App\Models\Conversation_table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    //

    public function RegisterAccount(Request $request){

        $ValidateRequest = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8'
        ]);

        User::create([
            'name' => $ValidateRequest['fullname'],
            'email' => $ValidateRequest['email'],
            'password' => Hash::make($ValidateRequest['password']),
            'role' => 'user',
            'status' => '1',
            'login' => '0'
        ]);

        return redirect()->route('login');
    }

    public function LoginAccount(LoginRequest $request){

        $get_userid = User::select('status')->where('email', $request->email)->first();

        if($get_userid){

            if(!$get_userid->status){
                return redirect()->back()->with('failedLogin', 'Your account has been disabled.');
            }
        }


        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()->with('failedLogin', 'Invalid email or password.');
        }

        $request->session()->regenerate();

        $user_auth = Auth::user();

        $user_auth->update([
            'login' => 1
        ]);

        if($user_auth->role == 'admin'){
            return redirect()->route('admindashboard');
        }else{
            return redirect()->route('userdashboard');
        }
    }

    public function LogoutAccount(){

        $user_auth = Auth::user();
        $user_auth->update([
            'login' => 0
        ]);

        Auth::logout();
        return redirect()->route('login');
    }

    public function ForgotPassword(){
        return Inertia::render('Index/ForgotPassword');
    }

    public function VerifyEmail(Request $request) {

        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::ResetLinkSent
            ? back()->with(['email_found' => __($status)])
            : back()->with(['email_notfound' => __($status)]);

    }

    public function ResetPasswordForm(Request $request){

        return Inertia::render('Index/ResetPasswordForm', [
            'email' => $request->email,
            'token' => $request->route('token')
        ]);

    }

    public function ResetPasswordHandler(Request $request){

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return redirect()->route('login');

    }

    //user
    public function updateuser(Request $request){

        $request->validate([
            'Name' => 'required|string|max:255',
            'Profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'Location' => 'required|string|max:255',
            'Age' => 'required|max:2',
            'Gender' => 'required|string|max:10',
            'About'  => 'required|string|max:1000',
            'Experience' => 'required|string|max:1000',
            'Education' => 'required|string|max:255',
            'Cv' => 'nullable|mimes:pdf|max:5120',
            'Resume' => 'nullable|mimes:pdf|max:5120',
        ]);

        $curr_user = Auth::user();

        $cv_path = $curr_user->cv_path;
        $resume_path = $curr_user->resume_path;
        $profile_path = $curr_user->profile_picture;

        if ($request->hasFile('Resume')) {
            $resume_path = $request->file('Resume')->store('jobscoutfiles', 'public');
        }

        if ($request->hasFile('Cv')) {
            $cv_path = $request->file('Cv')->store('jobscoutfiles', 'public');
        }

        if ($request->hasFile('Profile')) {
            $profile_path = $request->file('Profile')->store('images', 'public');
        }

        $curr_user->update([
            'name' => $request->Name,
            'profile_picture' => $profile_path,
            'location' => $request->Location,
            'age' => $request->Age,
            'gender' => $request->Gender,
            'about' => $request->About,
            'education' => $request->Education,
            'cv_path' => $cv_path,
            'resume_path' => $resume_path,
            'experience' => $request->Experience
        ]);

    }

    public function UpdateUserAccount(Request $request){

        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|string|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->with(['failed_admin_oldpassword' => 'The old password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->newpassword)
        ]);

        return back();
    }

    //admin
    public function EditMemberJob(Request $request, Members_table $id){

        $request->validate([
            'jobid' => 'required'
        ]);

        $get_newjobinfo = Job_list::select('id', 'job_title', 'type', 'salary')
                    ->where('id', $request->jobid)
                    ->first();

        $id->update([
            'jobid' => $get_newjobinfo->id,
            'position' => $get_newjobinfo->job_title,
            'employment_type' => $get_newjobinfo->type,
            'salary' =>  $get_newjobinfo->salary,

        ]);

        return back();
    }

    public function EditMemberinfo(Request $request, User $id){


        $request->validate([
            'age' => 'required|max:2',
            'gender' => 'required|string|max:10',
            'location' => 'required|string|max:255',
            'about' => 'required|string|max:1000',
            'education' => 'required|string|max:255',
            'experience' => 'required|string|max:1000',
            'name' => 'required|string|max:255',
        ]);


        $id->update([
            'name' => $request->name,
            'location' => $request->location,
            'age' => $request->age,
            'gender' => $request->gender,
            'about' => $request->about,
            'education' => $request->education,
            'experience' => $request->experience
        ]);

        return back();

    }

    public function DisabledUser(User $id){

        $id->update([
            'status' => 0
        ]);

        $member = Members_table::where('userid', $id->id)->first();

        if($member){

            $member->update([
                'status' => 0
            ]);

        }

        return back();
    }

    public function ActivatedUser(User $id){

        $id->update([
            'status' => 1
        ]);

        $member = Members_table::where('userid', $id->id)->first();

        if($member){
            $member->update([
                'status' => 1
            ]);
        }

        return back();
    }

    public function CreateMember(Request $request){

        $request->validate([
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'age' => 'required|max:2',
            'gender' => 'required|string|max:10',
            'location' => 'required|string|max:255',
            'about' => 'required|string|max:1000',
            'education' => 'required|string|max:255',
            'experience' => 'required|string|max:1000',
            'resume' => 'required|mimes:pdf|max:5120',
            'cv' => 'required|mimes:pdf|max:5120',

            'job' => 'required',
            'joblocation' => 'required',
            'salary' => 'required',
            'type' => 'required',

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8'
        ]);

        $resume = '';
        $cv = '';
        $profile = '';

        if ($request->hasFile('resume')) {
            $resume = $request->file('resume')->store('resumes', 'public');
        }

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv')->store('cvs', 'public');
        }

        if ($request->hasFile('profile')) {
            $profile = $request->file('profile')->store('images', 'public');
        }

        $newuser_info = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'cv_path' => $cv,
            'resume_path' => $resume,
            'experience' => $request->experience,
            'about' => $request->about,
            'gender' => $request->gender,
            'age' => $request->age,
            'education' => $request->education,
            'location' => $request->location,
            'profile_path' => $profile,
            'status' => '1'

        ]);

        $newuser_application = Job_application::create([
           'user_id' => $newuser_info->id,
           'job_id' => $request->job,
           'cv_path' => $newuser_info->cv_path,
           'resume_path' => $newuser_info->resume_path,
           'status' => 'Hired',
        ]);

        $get_jobinfo = Job_list::where('id', $newuser_application->job_id)->first();

        //dd($get_jobinfo);
        $newmember_info =  Members_table::create([

            'userid' => $newuser_application->user_id,
            'jobid' => $newuser_application->job_id,
            'application_id' => $newuser_application->id,
            'position' => $get_jobinfo->job_title,
            'employment_type' => $get_jobinfo->type,
            'salary' => $get_jobinfo->salary,
            'status' => true,
            'hired_date' => date('Y-m-d')

        ]);


        $adminId = Auth::id();

        $checkconversation = Conversation_table::where('member_id', $newmember_info->userid)
                            ->first();

        if(!$checkconversation){

            $checkconversation = Conversation_table::create([
                'admin_id' => $adminId,
                'member_id' => $newmember_info->userid
            ]);

        }

        Message_table::create([
            'conversation_id' => $checkconversation->id,
            'sender_id' => $adminId,
            'message' => "Here is the result of your application for the position of {$get_jobinfo->job_title}: {$newuser_application->status}",
            'is_read' => 1
        ]);

        return back();
    }

    public function UpdateAdminAccount(Request $request){

        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|string|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->with(['failed_admin_oldpassword' => 'The old password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->newpassword)
        ]);

        return back();
    }
}
