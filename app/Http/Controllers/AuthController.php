<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;

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
            'role' => 'user'
        ]);

        return redirect()->route('login');
    }

    public function LoginAccount(LoginRequest $request){

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()->with('failedLogin', 'Invalid username or password.');
        }

        $request->session()->regenerate();

        $user_auth = Auth::user();

        if($user_auth->role == 'admin'){
            return redirect()->route('admindashboard');
        }else{
            return redirect()->route('userdashboard');
        }
    }

    public function LogoutAccount(){
        Auth::logout();
        return redirect()->route('login');
    }


    // update user profile
    public function updateuser(Request $request){

        $curr_user = Auth::user();

        $cv_path = $curr_user->cv_path;
        $resume_path = $curr_user->resume_path;
        $profile_path = $curr_user->profile_picture;

        if ($request->hasFile('resume_path')) {
            $resume_path = $request->file('resume_path')->store('images', 'public');
        }

        if ($request->hasFile('cv_path')) {
            $cv_path = $request->file('cv_path')->store('images', 'public');
        }

        if ($request->hasFile('profile')) {
            $profile_path = $request->file('profile')->store('images', 'public');
        }

        $curr_user->update([
            'name' => $request->name,
            'profile_picture' => $profile_path,
            'location' => $request->location,
            'age' => $request->age,
            'gender' => $request->gender,
            'about' => $request->about,
            'education' => $request->education,
            'cv_path' => $cv_path,
            'resume_path' => $resume_path,
            'experience' => $request->experience
        ]);

    }

}
