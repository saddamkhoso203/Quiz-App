<!DOCTYPE html>
<html lang="en">
<head>

    <title>Add Quiz page</title>
    @vite('resources/css/app.css')
</head>
<body>
<x-navbar :name="$name"></x-navbar>
<div class="bg-gray-100 flex flex-col items-center min-h-screen  pt-5">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        @if(!session('quizDetails'))
        
        
     <h1 class="text-2xl  mb-6 text-center text-gray-800 " >Add Quiz</h1>
           
     <form action="/add-quiz" method="get" class="space-y-4">
    
        <div>
            
            <input type="text" placeholder="Enter Quiz Name" name="quiz"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">

</div>

<div>
        <select type="text"  name="category_id"
         class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none "> 
         @foreach ($categories as $category )
        <option value="{{$category->id}}" >{{ $category->name }}</option>
        @endforeach
        </select>    
         </div>      
        <button type="submit" class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white">Add</button>
     </form>
     @else 
    <span class=" text-align-center font-bold text-green-500 "> Quiz : {{session('quizDetails')->name}}</span>
    <h1 class="text-2xl  mb-6 text-center text-gray-800 " >Add MCQs</h1>
    <form class="space-y-4" action="" method="get">
                 <div>
            
            <textarea type="text" placeholder="Enter Your Question" name="quiz"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none "></textarea>

</div>
       <div>
            
            <input type="text" placeholder="Enter First Option" name="quiz"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">

      </div>
        <div>
            
            <input type="text" placeholder="Enter Second Option" name="quiz"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">

      </div>
        <div>
            
            <input type="text" placeholder="Enter Third Option" name="quiz"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">

      </div>
        <div>
            
            <input type="text" placeholder="Enter Fourth Option" name="quiz"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">

      </div>
         <div>
            
            <select  name="Right Answer"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">
        
        <option value="">Select Right Answer</option>
<option value="">A</option>
<option value="">B</option>
<option value="">C</option>
<option value="">D</option>
        </select>

      </div>
             <button type="submit" class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white">Add More</button>
                    <button type="submit" class="block w-full bg-green-600 mt-4 py-2 rounded-2xl text-white">Add and Submit</button>
    </form>
     @endif 
</div>
</div>
</body>
</html>
