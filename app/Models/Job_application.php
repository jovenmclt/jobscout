<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job_list;
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
}
