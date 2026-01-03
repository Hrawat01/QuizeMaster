<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mcq extends Model
{
    //
    function quizze(){
        return $this->belongsTo(Quizze::class);
    }
}
