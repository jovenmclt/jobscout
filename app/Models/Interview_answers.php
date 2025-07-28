<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Interview_questions;
class Interview_answers extends Model
{
    //
    protected $table = 'interview_answers';
    protected $fillable = [
        'application_id',
        'question_id',
        'answer'
    ];

    public function jobquestion(){
        return $this->belongsTo(Interview_questions::class, 'question_id');
    }
}
