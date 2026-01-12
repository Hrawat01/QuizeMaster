<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Quizze;
use App\Models\Mcq;
use App\Models\User;
use App\Models\Record;
use App\Models\MCQ_record;
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
        $currentQuiz['recordId']=$record->id;
        Session::put('currentQuiz',$currentQuiz);
        // return $currentQuiz;
        $mcqData= Mcq::find($id);
        return view('mcq-page',['quizName'=>$name,'mcqData'=>$mcqData]);
    }else{
        return "record not saved";
    }
}








// submit and next

function submitNext(Request $req,$id){
$currentQuiz= Session::get('currentQuiz');
$currentQuiz['currentMcq']+=1;
$mcqData = Mcq::where([['id','>',$id],['quiz_id',$currentQuiz['quizId']]])->first();



// checking if record already exists

$isExist= MCQ_record::where([
    ['record_id',$currentQuiz['recordId']],
    ['mcq_id',$req->id]
    ])->first();

if(!$isExist){

$mcq_record = new MCQ_record();
$mcq_record->record_id= $currentQuiz['recordId'];
$mcq_record->user_id= Session::get('user')->id;
$mcq_record->mcq_id=$req->id;
$mcq_record->select_answer= $req->option;

if($req->option == Mcq::find($req->id)->correct_ans){
    $mcq_record->is_correct=1;
}else{
    $mcq_record->is_correct=0;
}

if(!$mcq_record->save()){
    return "something went wrong";
}
}





Session::put('currentQuiz',$currentQuiz);

if ($mcqData) {
    return view('mcq-page',['quizName'=>$currentQuiz['quizName'],'mcqData'=>$mcqData]);
} else {
     $resultData = MCQ_record::withMCQ()->where('record_id',$currentQuiz['recordId'])->get();
     $resultCount = MCQ_record::where([
        ['record_id','=',$currentQuiz['recordId']],['is_correct','=',1]
        ])->count();

        $record =Record::find($currentQuiz['recordId']);
        if($record){
        $record->status=2;
        $record->update();
        }
    return view('quiz-result',['resultData'=>$resultData,'resultCount'=>$resultCount]);
}

}





// user quiz is completed or not

function userDetails(){
    $quizRecord = Record::withQuiz()->where('user_id',Session::get('user')->id)->get();
    return view('user-details',['quizRecord'=>$quizRecord]);
}




//  searching

function searchQuiz(Request $req){
    $quizData = Quizze::withCount('Mcqs')->where('name','like','%'.$req->search.'%')->get(); //use withCount because on ui count is not visible
    return view('quiz-search',['quizData'=>$quizData,'quiz'=>$req->search]);
}




}