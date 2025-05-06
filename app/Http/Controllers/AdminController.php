<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\MCQs;

use function Pest\Laravel\put;

class AdminController extends Controller
{
    // Handle admin login
    public function login(Request $request){

        // Validate login inputs
        $request->validate([
            "name" => "required",
            "password" => "required",
        ]);

        // Find admin by name
        $admin = Admin::where("name", $request->name)->first();

        // Check if admin exists and password matches
        if(!$admin || $admin->password !== $request->password){
            return back()->withErrors([
                "name" => "Admin does not exist."
            ]);
        }

        // Store admin in session and redirect to dashboard
        Session::put('admin', $admin);
        return redirect('dashboard');
    }

    // Show admin dashboard
    public function dashboard(){
        $admin = Session::get('admin');
        if($admin){
            return view('admin.admin', ["name" => $admin->name]); 
        } else {
            return redirect('/');
        }      
    }

    // Display all categories
    public function categories(){
        $categories = Category::get();
        $admin = Session::get('admin');
        if($admin){
            return view('categories', ["name" => $admin->name, "categories"=>$categories]); 
        } else {
            return redirect('/');
        }      
    }

    // Add a new category
    public function AddCategory(Request $request){
        $admin = Session::get('admin');

        // Validate category input
        $request->validate([
            'category' => 'required|min:3|max:255|unique:categories,name',
        ]);

        // Create and save new category
        $categories = new Category();
        $categories->name = $request->category;
        $categories->creater = $admin->name;

        if($categories->save()){
            Session::flash('category', 'Category ' . $request->category . " added");
        }

        return redirect("categories");
    }

    // Delete a category by ID
    public function deleteCategory($id){
        $isDeleted = Category::find($id)->delete();
        if($isDeleted){
            Session::flash('category', 'Success: Category deleted');
        }
        return redirect('categories');
    }

    // Show quiz page
    public function quiz(){
        $admin = Session::get('admin');
        $categories = Category::get();
        $total_mcq = 0;

        // Create quiz if inputs are given and no session exists
        if($admin){
            $quizName = request('quiz');
            $category_id = request('category_id');

            if($quizName && $category_id && !Session::has('QuizDetails')){
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $category_id;

                if($quiz->save()){
                    Session::put('QuizDetails', $quiz);
                }else {
                    // Redirect back if saving fails (optional)
                    return redirect()->back()->with('error', 'Quiz could not be created.');
                }
            }
            // Always get quiz form session here
            $quiz = Session::get('QuizDetails');

            if($quiz){
                $total_mcq = MCQs::where('quiz_id', $quiz->id)->count();
            }

            return view('quiz', [
                "name" => $admin->name, 
                "categories" => $categories,
                "total_mcq" => $total_mcq,
            ]); 
        } else {
            return redirect('/');
        }      
    }
    public function addMCQs(Request $request){
        $request->validate([
            "question" => "required",
            "a" => "required",
            "b" => "required",
            "c" => "required",
            "d" => "required",
            "correct_ans" => "required",
        ]);
        $mcqs = new MCQs();
        $admin = Session::get('admin');
        $quiz = Session::get('QuizDetails');
        $mcqs->question = $request->question;
        $mcqs->a = $request->a;
        $mcqs->b = $request->b;
        $mcqs->c = $request->c;
        $mcqs->d = $request->d;
        $mcqs->correct_ans = $request->correct_ans;

        $mcqs->admin_id = $admin->id;
        $mcqs->quiz_id = $quiz->id;
        $mcqs->category_id = $quiz->category_id;
        if($mcqs->save()){
            if($request->input('action') == 'add_more')  {
                return redirect()->back();
            }else{
                Session::forget('QuizDetails');
                return redirect('quiz');
            }
        }
    }
    public function endQuiz(){
        Session::forget('QuizDetails');
        return redirect('quiz');
    }
    public function showQuiz($id, $quizName){
        $admin = Session::get('admin');
        $mcqs = MCQs::where('quiz_id', $id)->get();
        if($admin){
            return view('show-quiz', ["name" => $admin->name, "mcqs"=>$mcqs, "quizName"=>$quizName]); 
        } else {
            return redirect('/');
        }   
    }

    public function quizList($id, $category){
        $admin = Session::get('admin');
        $quizData = Quiz::where('category_id', $id)->get();
        if($admin){
            return view('quiz-list', ["name" => $admin->name, "quizData"=>$quizData, "category"=>$category]); 
        } else {
            return redirect('/');
        }
    }

    // Admin logout
    public function logout(){
        Session::forget('admin');
        return redirect('/');
    }
}
