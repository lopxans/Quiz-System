<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.login');
});

Route::controller(AdminController::class)->group(function(){
    Route::post('admin-login', 'login');
    Route::get('dashboard', 'dashboard');

    // categories page
    Route::get('categories', 'categories');
    Route::post('add-category', 'AddCategory');
    Route::get('category/delete/{id}', 'deleteCategory');

    // quiz page
    Route::get('quiz', 'quiz');
    Route::post('add-mcqs', 'addMCQs');
    Route::get('end-quiz', 'endQuiz');
    Route::get('show-quiz/{id}', 'showQuiz');

    // quiz page
    Route::get('welcome', 'welcome');

    Route::get('admin-logout', 'logout');
});
