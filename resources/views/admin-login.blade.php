<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin login</title>
    @vite('resources/css/app.css')
</head>
<style>
    .glowbtn:hover{
        box-shadow: 0 0 25px rgba(212, 142, 183, 0.7);
    }
</style>
<body class=" bg-gray-100 flex items-center justify-center min-h-screen ">
<div class="bg-white p-10 shadow-lg rounded-2xl w-full max-w-[65vh] flex items-center glowbtn">

    <h1 class="text-2xl text-blue-700 pr-5 font-bold ">Admin Login</h1>
    
    {{-- if action="admin.." then the path url will be like admin-login/admin-login --}}
    <form action="/admin-login" method="post" class="flex flex-col items-center">

        @csrf

        <div class="mb-4">
            @error('user')
                <div class="text-red-500">{{$message}}</div>
            @enderror
            <label for="" class="font-bold">Admin Name</label>
            <input type="text" placeholder="Enter the admin name" name="name"
            class="border px-3 border-gray-400 rounded-xl py-2 focus:outline-none "/>
            @error('name')
                <div class="text-red-400">{{$message}} </div>    {{-- $message is inbuild --}}
                @enderror
        </div>
        <div>
            <label for="" class="font-bold">Password</label>
            <input type="password" placeholder="Enter the password" name="password"
            class="border px-3 border-gray-400 rounded-xl py-2 focus:outline-none"/>
             @error('password')
                <div class="text-red-400">{{$message}} </div>    {{-- $message is inbuild --}}
                @enderror
        </div>
        <button class="w-[60%] bg-blue-600 mt-3 rounded-2xl p-1" type="submit">Login</button>
    </form>
</div>
</body>
</html>