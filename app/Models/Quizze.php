<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quizze extends Model
{
    function categories(){
        return $this->belongsTo(Categorie::class);
    }
    function mcqs(){
        return $this->hasMany(Mcq::class, 'quiz_id');
    }
}
