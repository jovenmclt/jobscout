<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll_table extends Model
{
    //
    protected $table = 'payroll_table';
    protected $fillable = [
        'employee_id',
        'amount',
        'payment_date',
        'status',
        'employee_status'
    ];
}
