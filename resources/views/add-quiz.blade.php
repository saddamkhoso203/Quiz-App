<!DOCTYPE html>
<html lang="en">
<head>

    <title>Add Quiz page</title>
    @vite('resources/css/app.css')
</head>
<body>
<x-navbar :name="$name"></x-navbar>
<div class="bg-blue-400 flex flex-col items-center min-h-screen  pt-5">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        @if(!session('quizDetails'))
        
        
     <h1 class="text-2xl  mb-6 text-center text-gray-800 " >Add Quiz</h1>
           
     <form action="/add-quiz" method="get" class="space-y-4">
    
        <div>
            
            <input type="text" placeholder="Enter Quiz Name" name="quiz" required
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
    <form class="space-y-4" action="add-mcq" method="post">
                 <div>
                    @csrf
            
            <textarea type="text" placeholder="Enter Your Question" name="question"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none "></textarea>
@error('question')
                <div class="text-red-500 text-xs mt-1">{{$message}}</div>
@enderror
</div>
       <div>
            
            <input type="text" placeholder="Enter First Option" name="a"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">
            @error('a') 
                <div class="text-red-500 text-xs mt-1">{{$message}}</div>
            @enderror

      </div>
        <div>
            
            <input type="text" placeholder="Enter Second Option" name="b"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">
            @error('b') 
                <div class="text-red-500 text-xs mt-1">{{$message}}</div>
            @enderror

      </div>
        <div>
            
            <input type="text" placeholder="Enter Third Option" name="c"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">
            @error('c') 
                <div class="text-red-500 text-xs mt-1">{{$message}}</div>
            @enderror

      </div>
        <div>
            
            <input type="text" placeholder="Enter Fourth Option" name="d"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">
            @error('d') 
                <div class="text-red-500 text-xs mt-1">{{$message}}</div>
            @enderror

      </div>
         <div>
            
            <select  name="correct_ans"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">

        
        <option value="">Select Right Answer</option>
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
<option value="d">D</option>
        </select>
@error('correct_ans')
                <div class="text-red-500 text-xs mt-1">{{$message}}</div>
@enderror
      </div>
             <button type="submit" value="add-more" name="submit" class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white">Add More</button>
             <button type="submit" value="done" name="submit" class="block w-full bg-green-600 mt-4 py-2 rounded-2xl text-white">Add and Submit</button>
             <button type="submit" value="done" name="submit" class="block w-full bg-red-600 mt-4 py-2 rounded-2xl text-white">Finish Quiz</button>
    </form>
     @endif 
</div>
</div>
</body>
</html>
