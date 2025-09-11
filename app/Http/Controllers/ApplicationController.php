<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_application;
use App\Models\Interview_answers;
use Illuminate\Support\Facades\Auth;
use App\Models\Members_table;
use App\Models\Payroll_table;
use App\Models\Job_list;
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

    public function ResultApplication(Request $request, Job_application $id){

        $id->update([
            'status' => $request->result
        ]);

        if($id->status == 'Hired'){

            $get_userid = $id->user_id;
            $get_jobid = $id->job_id;
            $application_id = $id->id;

            $get_jobinfo = Job_list::where('id', $get_jobid)
                        ->first();

            $new_employee = Members_table::create([
                'userid' => $get_userid,
                'jobid' => $get_jobid,
                'application_id' => $application_id,
                'position' => $get_jobinfo->job_title,
                'employment_type' => $get_jobinfo->type,
                'salary' => $get_jobinfo->salary,
                'status' => 'active',
                'hired_date' => date('Y-m-d')
            ]);

            Payroll_table::create([
                'employee_id' => $new_employee->id,
                'amount' => $new_employee->salary,
                'payment_date' => date('Y-m-d'),
                'status' => 'pending',
                'employee_status' => $new_employee->status
            ]);

            Job_application::where('user_id', $get_userid)
                    ->where('status', 'Processing')
                    ->where('id', '!=', $id->id)
                    ->update([ 'status' => 'Cancelled' ]);

        }

        return back();

    }
}
