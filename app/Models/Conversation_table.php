<?php

namespace App\Models;

use App\Models\Message_table;
use Illuminate\Database\Eloquent\Model;

class Conversation_table extends Model
{
    //

    protected $table = 'conversation_table';
    protected $fillable = [
        'admin_id',
        'member_id'
    ];


    public function message()
    {
        return $this->hasMany(Message_table::class, 'conversation_id');
    }
}
