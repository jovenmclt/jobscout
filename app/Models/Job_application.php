<?php

namespace App\Models;

use App\Models\User;
use App\Models\Job_list;
use Illuminate\Database\Eloquent\Model;

class Job_application extends Model
{
    //
    protected $table = 'applications';
    protected $fillable = [
        'user_id',
        'job_id',
        'cv_path',
        'resume_path',
        'status'
    ];


    public function jobapplied(){
        return $this->belongsTo(Job_list::class, 'job_id');
    }

     public function userapplied(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
