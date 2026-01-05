<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Quizze;
use App\Models\Mcq;
use App\Models\User;
use App\Models\Record;
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
        $mcqs = Mcq::where('quiz_id',$id)->get();


         Session::put('firstMCQ',$mcqs[0]);

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


 function userLogin(Request $req){
        $validate = $req->validate([
            'email'=>'required | email ',
            'password'=>'required ',
        ]);
      $user = User::where('email',$req->email)->first();
      if (!$user || !Hash::check($req->password, $user->password)) {
    return "user not valid";  
    }
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

function userLoginQuiz(){
    Session::put('quiz-url', url()->previous());
    return view('user-login');  
}

function mcq($id,$name){
    $record = new Record();
    $record->user_id= Session::get('user')->id;
    $record->quiz_id= Session::get('firstMCQ')->quiz_id;
    $record->status = 1;
    if ($record->save()) {
        $currentQuiz=[];
        $currentQuiz['totalMcq']= Mcq::where('quiz_id',Session::get('firstMCQ')->quiz_id)->count();
        $currentQuiz['currentMcq']=1;
        $currentQuiz['quizName']=$name;
        $currentQuiz['quizId']=Session::get('firstMCQ')->quiz_id;
        Session::put('currentQuiz',$currentQuiz);
        $mcqData= Mcq::find($id);
        
        return view('mcq-page',['quizName'=>$name,'mcqData'=>$mcqData]);
    }else{
        return "record not saved";
    }
}

function submitNext($id){
$currentQuiz= Session::get('currentQuiz');
$currentQuiz['currentMcq']+=1;
$mcqData = Mcq::where([['id','>',$id],['quiz_id',$currentQuiz['quizId']]])->first();

Session::put('currentQuiz',$currentQuiz);

if ($mcqData) {
    return view('mcq-page',['quizName'=>$currentQuiz['quizName'],'mcqData'=>$mcqData]);
} else {
    return 'result page here';
}

}
}
