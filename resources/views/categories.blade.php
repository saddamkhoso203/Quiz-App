<!DOCTYPE html>
<html lang="en">
<head>

    <title>Admin dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
<x-navbar :name="$name"></x-navbar>
@if (session('category'))
<div class="bg-green-100 text-white pl-5">{{session('category')}}</div>
@endif

<div class="bg-gray-100 flex  justify-center pt-10">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
     <h1 class="text-2xl  mb-6 text-center text-gray-800 " >Add Category</h1>
           
     <form action="/add-category" method="post" class="space-y-4">
        @csrf
        <div>
            
            <input type="text" placeholder="Enter Category Name" name="category"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">
        
        </div>
      
        <button type="submit" class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white">Add</button>
     </form>
 </div>
</div>
</body>
</html>
