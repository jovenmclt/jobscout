<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation_table extends Model
{
    //

    protected $table = 'conversation_table';
    protected $fillable = [
        'admin_id',
        'member_id'
    ];
}
