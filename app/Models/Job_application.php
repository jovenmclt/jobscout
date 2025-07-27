<?php

namespace App\Models;

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
}
