<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    //create fillable prop

     protected $fillable = [
        'time', 'title', 'description',
    ];

    public function user(){
        return $this->belongsToMny('App\User');
    }



}
