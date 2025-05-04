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

    // quiz page
    Route::get('quiz', 'quiz');

    // quiz page
    Route::get('welcome', 'welcome');
});
