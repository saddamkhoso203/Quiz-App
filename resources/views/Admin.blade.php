<!DOCTYPE html>
<html lang="en">
<head>

    <title>Admin dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="bg-white shadow-md px-4 py-3">
   <div class="flex justify-between items-center">
         <div class="font-bold text-2xl text-gray-700 hover:text-blue-500 cursor-pointer">
            Quiz System
        </div>
        <div class="flex space-x-4">
            <a href="" class="text-gray-700 hover:text-blue-500">Categaries</a>
            <a href="" class="text-gray-700 hover:text-blue-500">Quiz</a>
            <a href="" class="text-gray-700 hover:text-blue-500">Welcome {{ $name }}</a>
            <a href="" class="text-gray-700 hover:text-blue-500">Logout</a>
        </div>
   </div>
    </nav>
</body>
</html>
