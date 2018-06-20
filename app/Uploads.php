<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    use SoftDeletes;
    protected $fillable = [
      'filename','size',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
