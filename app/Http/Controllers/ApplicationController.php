<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_application;
use App\Models\Interview_answers;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    //

    public function Application(Request $request){

        $validateRequest = $request->validate([
            'interview.*.answer' => 'required|string',
            'interview.*.question_id' => 'required',
            'resume_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cv_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'job_id' => 'required',
        ]);

        $userid = Auth::id();
        $jobid = $validateRequest['job_id'];

        if ($request->hasFile('resume_path') && $request->hasFile('cv_path')) {
            $resume = $request->file('resume_path')->store('images', 'public');
            $cv = $request->file('cv_path')->store('images', 'public');
        }

        $user_application = Job_application::create([
            'user_id' => $userid,
            'job_id' => $jobid,
            'cv_path' => $cv,
            'resume_path' => $resume,
            'status' => 'Processing'
        ]);

        foreach($validateRequest['interview'] as $interview){
            Interview_answers::create([
                'application_id' => $user_application->id,
                'question_id' => $interview['question_id'],
                'answer' => $interview['answer']
            ]);
        }

        return back();

    }
}
