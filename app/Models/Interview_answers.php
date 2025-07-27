<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview_answers extends Model
{
    //
    protected $table = 'interview_answers';
    protected $fillable = [
        'application_id',
        'question_id',
        'answer'
    ];
}
