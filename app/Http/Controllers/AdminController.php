<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

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
       $admin = Session::get('admin');
    if ($admin) {
           return view('categories',['name' => $admin->name]);
        
    }else
 
return redirect('admin-login');
}

//funtion for logout
function logout(){
    Session::forget('admin');
    return redirect('admin-login');
}


}
