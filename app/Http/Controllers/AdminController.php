<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;

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

$validate = $request->validate([
    'category' => 'required | min:5  | unique:categories,name' 
]);
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


 //function for delete categories

 function deleteCategory($id){
  
     $isDeleted = Category::where('id', $id)->delete();
     if ($isDeleted) {
        # code...
        Session::flash('category', "Success: Category Deleted..");
        return redirect('admin-categories');
     }
 }

//function for add quiz
function addQuiz(){
// return Session::get('quizDetails');
    $admin = Session::get('admin');
    $categories = Category::get();
    if ($admin) {
        $quizName = request('quiz');
        $category_id = request('category_id');
   if ($quizName && $category_id && !Session::has('quizDetails')) {
        # code...
        $quiz = new Quiz();
        $quiz->name = $quizName;
        $quiz->category_id = $category_id;
        // $quiz->creator= $admin->name;
        if ($quiz->save()) {
            # code...
            Session::put('quizDetails', $quiz);
        }
        return redirect('add-quiz');
    }
           return view('add-quiz',['name' => $admin->name, "categories" => $categories]);
        
    }else
 
return redirect('admin-login');
}


// //function for Edit Category
// function editCategory($id){
//     $category = Category::where('id', $id)->first();
//     $admin = Session::get('admin');
//     if ($admin) {
//            return view('edit-category',['name' => $admin->name, "category" => $category]);
        
//     }else
 
// return redirect('admin-login'); 
// }

}
