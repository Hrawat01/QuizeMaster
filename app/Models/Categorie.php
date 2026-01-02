<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    function quizzes(){
        return $this->hasMany(Quizze::class,'category_id');
    }
}
