<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_list;
use App\Models\Interview_questions;
class JobListController extends Controller
{
    //

    public function CreateNewJob(Request $request){

        $validateRequest = $request->validate([
            'jobtitle' => 'required|string|max:255|unique:job_list,job_title',
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'status' => 'required|boolean',
            'interview_questions.*.question' => 'required|string|max:255'
        ]);

        $newJob = Job_list::create([
            'job_title' => $validateRequest['jobtitle'],
            'salary'  => $validateRequest['salary'],
            'location'  => $validateRequest['location'],
            'type'  => $validateRequest['type'],
            'description'  => $validateRequest['description'],
            'status'  => $validateRequest['status'],
        ]);

        foreach($validateRequest['interview_questions'] as $question){
            Interview_questions::create([
                'job_id' => $newJob->id,
                'question' => $question['question']
            ]);
        }

        return back();
    }
}
