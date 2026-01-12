<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class=" bg-white">
   <x-navbar name={{$name}}> </x-navbar>
 <div class="flex flex-col min-h-[98%] items-center pt-8">
      <div class="w-[60%]"><br><br>
               <h1 class="text-3xl text-blue-700 font-bold">User List</h1><br>

               <ul class="border border-gray-200 overflow-hidden">
                    <li class="font-bold p-2">
                         <ul class="flex justify-between">
                              <li >S.No</li>
                              <li >Name</li>
                              <li >Email</li>
                         
                         </ul>
                    </li>

                    @foreach ($users as $key=>$user)
                    <li class="even:bg-gray-200 p-2">
                         <ul class="flex justify-between">
                              <li >{{$key+1}}</li>
                              <li >{{$user->name}}</li>
                              <li >{{$user->email}}</li>
                         </ul>
                    </li>
                    @endforeach
               </ul>
               <div class="mt-3">
                 {{$users->links()}}
               </div>
          </div>
 </div>
</body>

</html>