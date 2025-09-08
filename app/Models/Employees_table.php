<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees_table extends Model
{
    //

    protected $table = 'employees_table';
    protected $fillable = [
        'userid',
        'jobid',
        'application_id',
        'position',
        'employment_type',
        'salary',
        'status',
        'hired_date',
        'termination_date',
    ];
}
