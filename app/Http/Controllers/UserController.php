<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Quizze;

class UserController extends Controller
{
    function welcome(){

        $categories = Categorie::withCount('quizzes')->get();
        // $categories = Categorie::get();
           return view('welcome', ['categories' => $categories]);
    }

    function userQuizList($id,$category){
        
       $quizData = Quizze::where('category_id',$id)->get();
       return view('user-quiz-list',['quizData'=>$quizData, 'category'=>$category]);
   
    }
}
