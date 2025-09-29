<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members_table extends Model
{
    //

    protected $table = 'members_table';
    protected $fillable = [
        'userid',
        'jobid',
        'application_id',
        'position',
        'employment_type',
        'salary',
        'status',
        'hired_date',
    ];

    public function userinfo(){
        return $this->belongsTo(User::class, 'userid');
    }

    public function jobinfo(){
        return $this->belongsTo(Job_list::class, 'jobid');
    }

    public function application(){
        return $this->belongsTo(Job_application::class, 'application_id');
    }
}
