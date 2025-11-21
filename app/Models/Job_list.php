<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job_list extends Model
{
    //
    use HasFactory;

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
