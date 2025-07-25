<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview_questions extends Model
{
    //
    protected $table = 'interview_questions';
    protected $fillable = [
        'job_id',
        'question'
    ];
}
