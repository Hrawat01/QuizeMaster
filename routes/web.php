<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/',[UserController::class,'welcome']);
Route::get('user-quiz-list/{id}/{category}',[UserController::class,'userQuizList']);
Route::view('user-signup','user-signup');
Route::get('start-quiz/{id}/{name}',[UserController::class,'startQuiz']);
Route::post('user-signup',[UserController::class,'userSignup']);
Route::get('user-logout',[UserController::class,'userLogout']);
Route::get('user-signup-quiz',[UserController::class,'userSignupQuiz']);


// Route::get('/', function () {
//     return view('welcome');
// });


Route::view('admin-login','admin-login');




Route::post('admin-login',[AdminController::class,'login']);
Route::get('dashboard',[AdminController::class,'dashboard']);
Route::get('admin-categories',[AdminController::class,'categories']);
Route::get('admin-logout',[AdminController::class,'logout']);
Route::post('add-categories',[AdminController::class,'addCategory']);
Route::get('category/delete/{id}',[AdminController::class,'deleteCategory']);
Route::get('add-quiz',[AdminController::class,'addQuiz']);
Route::post('add-mcq',[AdminController::class,'addMCQs']);


Route::get('show-quiz/{id}',[AdminController::class,'showQuiz']);
Route::get('quiz-list/{id}/{category}',[AdminController::class,'quizList']);