<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Category;

class AdminController extends Controller
{
    //login Function
    function login( Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $admin = Admin::where([
            'name' => $request->name],
           [ 'password' => $request->password
        ]
        
        )->first();
if (!$admin) {
             $validate = $request->validate([
            'user' => 'required',
           
        ],[
            'user.required' => 'Invalid User'
        ]);
        }
         
        Session::put('admin', $admin);
        return redirect('dashboard');
    }

function dashboard(){
    $admin = Session::get('admin');
    if ($admin) {
           return view('admin',['name' => $admin->name]);
        
    }else
 
return redirect('admin-login');


}
//funtion for categories
function categories(){
    $categories = Category::get();
       $admin = Session::get('admin');
    if ($admin) {
           return view('categories',['name' => $admin->name, "categories" => $categories]);
        
    }else
 
return redirect('admin-login');
}

//funtion for logout
function logout(){
    Session::forget('admin');
    return redirect('admin-login');
}
 //function for add categories
 
 function addCategory(Request $request){


    $admin = Session::get('admin');
    $category = new Category();
    $category->name = $request->category;
    $category->creator= $admin->name;
    if ($category->save()) {
        # code...
        Session::flash('category', "Success: Category "  . $request->category  .  " Added..");
    }
    return redirect('admin-categories');
 }





}
