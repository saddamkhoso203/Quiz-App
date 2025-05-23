<!DOCTYPE html>
<html lang="en">
<head>

    <title>admin login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
 <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
     <h1 class="text-2xl  mb-6 text-center text-gray-800 " >admin login</h1>  
     <form action="/admin-login" method="post" class="space-y-4">
        @csrf
        <div>
            <label for="" class="text-gray-600 mb-1 "> Admin Name</label>
            <input type="text" placeholder="Enter Admin Name" name="name"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">
        </div>
             <div>
            <label for="" class="text-gray-600 mb-1 "> Password</label>
            <input type="password" placeholder="Enter Admin Password" name="password"
            class="w-full px-4 py-2 border border-gray-300 rounded-xl  focus:outline-none ">
        </div>
        <button type="submit" class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white">Login</button>
     </form>
 </div>
</body>
</html>
