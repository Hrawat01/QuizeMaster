<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quizze extends Model
{
    function categories(){
        return $this->belongsTo(Categorie::class);
    }
}
