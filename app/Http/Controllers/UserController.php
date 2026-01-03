<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Quizze;
use App\Models\Mcq;
use App\Models\User;
use Session;

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
            'email'=>'required | email |unique:users',
            'password'=>'required | min:3 | confirmed',
        ]);
        $user = User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
        ]);
        if ($user) {
            Session::put('user', $user);
            if (Session('quiz-url')) {
               $url= Session::get('quiz-url');
                Session::forget('quiz-url');
                return redirect($url);
            }
            return redirect('/');
            
    }
}

function userLogout(){
    Session::forget('user');
    return redirect('/');
}

function userSignupQuiz(){
    Session::put('quiz-url', url()->previous());
    return view('user-signup');

}

}
