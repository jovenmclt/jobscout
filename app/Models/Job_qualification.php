<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_qualification extends Model
{
    //

    protected $table = 'job_qualification';
    protected $fillable = [
        'jobid',
        'qualification'
    ];
}
