<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
   // protected $fillable = ['content', 'user_id'];
    protected $fillable = ['place','crop','cultivar','seedingday', 'user_id'];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
