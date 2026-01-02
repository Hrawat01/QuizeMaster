<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Categorie;
use App\Models\Quizze;
use App\Models\Mcq;


class AdminController extends Controller
{

    //login


   function login(Request $req){

    // validation
    $validation =$req->validate([
        "name"=>"required",
        "password"=>"required",
    ]);
    $admin = Admin::where([
        ['name','=',$req->name],
        ['password','=',$req->password],
    ])->first();  

    if (!$admin) {
        $validation =$req->validate([
        "user"=>"required",
    ],["user.required"=>"User does not exist"]);
    }
    //use ->get() to retrieve the data
    Session::put('admin', $admin);
    return redirect('dashboard');
   }




   //dashboard

   function dashboard(){

   $admin =  Session::get('admin');
   if ($admin) {
       return view('admin',['name'=>$admin->name]);
   }else{
    return redirect('admin-login');
   }
   }



   //categories 

   function categories(){
       $admin =  Session::get('admin');
       $categorie = Categorie::get();
   if ($admin) {
       return view('categories',['name'=>$admin->name,'categories'=>$categorie]);
   }else{
    return redirect('admin-login');
   }
   }


   
   //logout

   function logout(){
 Session::forget('admin');
  return redirect('admin-login');
   }



   //add categories




   function addCategory(Request $req){
     $validation =$req->validate([
        "category"=>"required|min:3",
    ]); 
    $admin = Session::get('admin');
    $categeories = Categorie::where("name",$req->category)->first();

    if (!$categeories) {
        
        $categorie = new Categorie();
        $categorie->name = $req->category;
        $categorie->creator = $admin->name;
        if ($categorie->save()) {
            Session::flash('category','Success : Category '.$req->category.' Added .');
        }
        return redirect("admin-categories");
    }
    else{
        return redirect("admin-categories")->with("error", "Category already exists"); //with mean flash session('error',".....")

    }
   }


   function deleteCategory($id){
       $name =Categorie::find($id);
    $del = Categorie::find($id)->delete();
    if ($del) {
           Session::flash('deleted',' Category '.$name->name.' deleted .');
        return redirect('admin-categories');
    }
   }

   function addQuiz(){
       $admin =  Session::get('admin');
       $totalMCQs=0;
       if ($admin) {
       $categorie = Categorie::get();

    $quizName = request('quiz');
    $quizCategorie = request('category_id');

    if ( $quizName && $quizCategorie && !Session::has('quizDetails')) {
        $quiz = new Quizze();
        $quiz->name =  $quizName;
        $quiz->category_id =  $quizCategorie;
        if ($quiz->save()) {
            Session::put('quizDetails',$quiz);
        }
    }else{
         $quiz = Session::get('quizDetails');
         if ($quiz) {
            $totalMCQs = MCQ::where('quiz_id',$quiz->id)->count();
         }
    }

       return view('add-quiz',['name'=>$admin->name,'categories'=>$categorie , 'totalMCQs'=>$totalMCQs]);
    }else{
    return redirect('admin-login');
   }
   }


//    add mcqs
function addMCQs(Request $req){
    if($req->submit=='back'){
        Session::forget('quizDetails');
        return redirect('/add-quiz');
    }
    $req->validate([
        "question" => "required | min:3",
        "a" => "required",
        "b" => "required",
        "c" => "required",
        "d" => "required",
        "correct_ans" => "required"
        
    ]);
    $mcq = new Mcq();
    $quiz = Session::get('quizDetails');
    $admin = Session::get('admin');
    $mcq->question  = $req->question;
    $mcq->a  = $req->a;
    $mcq->b  = $req->b;
    $mcq->c  = $req->c;
    $mcq->d  = $req->d;
    $mcq->correct_ans  = $req->correct_ans;

     $mcq->admin_id  = $admin->id;
     $mcq->quiz_id  = $quiz->id;
     $mcq->category_id  = $quiz->category_id; 
    if ($mcq->save()) {
         if ($req->submit=='add-more') {
        return redirect(url()->previous());
     }else{
        Session::forget('quizDetails');
        return redirect('/add-quiz');
     }
    }
    }



    // show quiz 
    function showQuiz($id){
         $admin =  Session::get('admin');
       $mcqs = Mcq::where('quiz_id',$id)->get();
   if ($admin) {
       return view('show-quiz',['name'=>$admin->name,'mcqs'=>$mcqs]);
   }else{
    return redirect('admin-login');
   }
    }




    // list the quiz 
    function quizList($id ,$category){
        $admin =  Session::get('admin');
        if ($admin) {
       $quizData = Quizze::where('category_id',$id)->get();
       return view('quiz-list',['name'=>$admin->name,'quizData'=>$quizData, 'category'=>$category]);
   }else{
    return redirect('admin-login');
   }
    }
}
