<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('admin-login', function () {
    return view('admin.login');
});

Route::controller(AdminController::class)->group(function(){
    Route::post('admin-login', 'login');
    Route::get('dashboard', 'dashboard');

    // categories page
    Route::get('categories', 'categories');
    Route::post('add-category', 'AddCategory');
    Route::get('category/delete/{id}', 'deleteCategory');
    Route::get('quiz-list/{id}/{Category}', 'quizList');

    // quiz page
    Route::get('quiz', 'quiz');
    Route::post('add-mcqs', 'addMCQs');
    Route::get('end-quiz', 'endQuiz');
    Route::get('show-quiz/{id}/{quizName}', 'showQuiz');

    Route::get('admin-logout', 'logout');
});


Route::view('user-signup', 'user-signup');
Route::controller(UserController::class)->group(function(){
    Route::get('/', 'welcome');
    Route::get('user-quiz-list/{id}/{Category}', 'userQuizList');
    Route::get('start-quiz/{id}/{name}', 'startQuiz');
    Route::post('user-signup', 'userSignup');
    Route::get('user-logout', 'userLogout');
    Route::get('user-signup-quiz', 'userSignupQuiz');
});