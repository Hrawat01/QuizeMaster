<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Quizze;
use App\Models\Mcq;

class UserController extends Controller
{
    function welcome(){

        $categories = Categorie::withCount('quizzes')->get();
        // $categories = Categorie::get();
           return view('welcome', ['categories' => $categories]);
    }

    function userQuizList($id,$category){
        
      $quizData = Quizze::withCount('mcqs')->where('category_id',$id)->get();
       return view('user-quiz-list',['quizData'=>$quizData, 'category'=>$category]);
   
    }

    function startQuiz($id,$name){
        $quizCount=  Mcq::where('quiz_id',$id)->count();
        $quizName = $name;
        return view('start-quiz',['quizCount'=>$quizCount,'quizName'=>$quizName]);
    }


    function userSignup(Request $req){
        $validate = $req->validate([
            'name'=>'required | min:3',
            'email'=>'required | email',
            'password'=>'required | min:3 | confirmed',
        ]);
    }
}
