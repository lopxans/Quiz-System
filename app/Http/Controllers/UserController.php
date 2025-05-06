<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Quiz;

class UserController extends Controller
{
    public function welcome(){
        $categories = Category::withCount('quizzes')->get();
        return view('welcome', ['categories'=>$categories]);
    }
    public function userQuizList($id,$category){
        $quizData = Quiz::where('category_id', $id)->get();
        return view('user-quiz-list', ["quizData"=>$quizData, "category"=>$category]); 
    }
}
