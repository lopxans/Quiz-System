<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class AdminController extends Controller
{
    public function login(Request $request ){

        $request->validate([
            "name" => "required",
            "password" => "required",
        ]);

        $admin = Admin::where("name", $request->name)->first();

        if(!$admin || $admin->password !== $request->password){
            return back()->withErrors([
                "name" => "Admin does not exist."
            ]);
        }

        Session::put('admin', $admin);
        return redirect('dashboard');
    }

    public function dashboard(){

        $admin = Session::get('admin');
        if($admin){
            return view('admin.admin', ["name" => $admin->name]); 
        }else{
            return redirect('dashboard');
        }      
    }

    public function categories(){
        $admin = Session::get('admin');
        if($admin){
            return view('categories', ["name" => $admin->name]); 
        }else{
            return redirect('dashboard');
        }      
    }

    public function quiz(){
        $admin = Session::get('admin');
        if($admin){
            return view('quiz', ["name" => $admin->name]); 
        }else{
            return redirect('dashboard');
        }      
    }

    public function welcome(){
        $admin = Session::get('admin');
        if($admin){
            return view('welcome', ["name" => $admin->name]); 
        }else{
            return redirect('dashboard');
        }      
    }
}
