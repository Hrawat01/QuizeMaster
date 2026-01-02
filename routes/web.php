<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/',[UserController::class,'welcome']);
Route::get('/user-quiz-list/{id}/{category}',[UserController::class,'userQuizList']);


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