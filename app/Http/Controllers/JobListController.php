<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_list;
use App\Models\Interview_questions;
use App\Models\job_qualification;
use App\Models\job_application;
use App\Models\Interview_answers;
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
            'interview_questions.*.question' => 'required|string|max:255',
            'job_qualification.*.qualification' => 'required|string|max:255'
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

        foreach($validateRequest['job_qualification'] as $quali){
            job_qualification::create([
                'jobid' => $newJob->id,
                'qualification' => $quali['qualification']
            ]);
        }

        return back();
    }

    public function EditJob(Job_list $jobupdateID, Request $request){

        //dd($request);
        $validateUpdateRequest = $request->validate([
            'jobtitle' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'status' => 'required|boolean',
            'interview_questions.*.id' => 'nullable|integer',
            'interview_questions.*.question' => 'required|string|max:255',
            'job_qualification.*.id' => 'nullable|integer',
            'job_qualification.*.qualification' => 'required|string|max:255'
        ]);

        $jobupdateID->update([
            'job_title' => $validateUpdateRequest['jobtitle'],
            'salary'  => $validateUpdateRequest['salary'],
            'location'  => $validateUpdateRequest['location'],
            'type'  => $validateUpdateRequest['type'],
            'description'  => $validateUpdateRequest['description'],
            'status'  => $validateUpdateRequest['status'],
        ]);


        foreach($validateUpdateRequest['interview_questions'] as $question){
            if (!empty($question['id'])) {
                Interview_questions::where('id', $question['id'])->update([
                    'question' => $question['question'],
                ]);
            } else {
                Interview_questions::create([
                    'job_id' => $jobupdateID->id,
                    'question' => $question['question'],
                ]);
            }

        }

        foreach($validateUpdateRequest['job_qualification'] as $qual){
            if (!empty($qual['id'])) {
                job_qualification::where('id', $qual['id'])->update([
                    'qualification' => $qual['qualification'],
                ]);
            } else {
                job_qualification::create([
                    'jobid' => $jobupdateID->id,
                    'qualification' => $qual['qualification'],
                ]);
            }

        }

        return back();
    }

    public function DeleteJob(Job_list $jobdeleteID){

        $get_questionId = Interview_questions::where('job_id', $jobdeleteID->id)->pluck('id');

        Interview_answers::whereIn('question_id', $get_questionId)->delete();
        Job_application::where('job_id', $jobdeleteID->id)->delete();
        Interview_questions::where('job_id', $jobdeleteID->id)->delete();
        job_qualification::where('jobid', $jobdeleteID->id)->delete();

        $jobdeleteID->delete();

        return redirect()->route('jobpage');
    }
}
