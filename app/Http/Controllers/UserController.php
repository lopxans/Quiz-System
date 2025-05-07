<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\MCQs;
use App\Models\Player;

class UserController extends Controller
{
    public function welcome(){
        $categories = Category::withCount('quizzes')->get();
        return view('welcome', ['categories'=>$categories]);
    }
    public function userQuizList($id,$category){
        $quizData = Quiz::withCount('Mcq')->where('category_id', $id)->get();
        return view('user-quiz-list', ["quizData"=>$quizData, "category"=>$category]); 
    }
    public function startQuiz($id, $name){
        $quizCount = MCQs::where('quiz_id', $id)->count();
        $quizName = $name;

        return view('start-quiz', ["quizCount"=>$quizCount, "quizName"=>$quizName]);
    }
    public function userSignup(Request $request){
        $request->validate([
            "name" => "required|min:5",
            "email" => "required|email|unique:players,email", // added unique validation
            "password" => "required|min:3 |confirmed",
        ]);

        // return MCQs::get();
        $user = Player::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "active" => 1,
        ]);

        if($user){
            Session::put('user', $user);
            if(Session::has('quiz-url')){
                $url = Session::get('quiz-url');
                Session::forget('quiz-url');               
                return redirect($url);
            }
            return redirect('/');
        }
    }
    public function userLogout(){
        Session::forget('user');
        return redirect('/');
    }
    public function userSignupQuiz(){
        Session::put('quiz-url', url()->previous());
        return view('user-signup');
    }
}
