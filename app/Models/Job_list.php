<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_list extends Model
{
    //

    protected $table = 'job_list';
    protected $fillable = [
        'job_title',
        'salary',
        'location',
        'type',
        'description',
        'status',
    ];
}
