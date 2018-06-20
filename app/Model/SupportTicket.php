<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function toUser(){
        return $this->belongsTo('App\User','to_user_id');
    }
}
