<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Categories</title>
     @vite('resources/css/app.css')
</head>

<body>
     <x-navbar name={{$name}}> </x-navbar>

     @if (Session('category'))
     <div class="bg-green-500 text-white pl-4 flash-message">{{Session('category')}}</div>
     @endif
     @if (Session('deleted'))
     <div class="bg-red-500 text-white pl-4 flash-message">{{Session('deleted')}}</div>
     @endif
     
<script>
    setTimeout(() => {
        let flashes = document.querySelectorAll('.flash-message');
       flashes.forEach(flash => {
            flash.style.transition = "opacity 0.5s ease";
            flash.style.opacity = 0;
            setTimeout(() => flash.remove(), 500); 
        });
    }, 3000); // 3 seconds
</script>


     <div class="flex flex-col min-h-[98%] items-center pt-8">

          <div class="bg-white p-10 shadow-lg rounded-2xl w-full max-w-[58vh] ">


               <h1 class="text-2xl text-blue-700 pr-5 font-bold text-center">Add Categories</h1><br><br>
               {{-- if action="admin.." then the path url will be like admin-login/admin-login --}}
               <form action="/add-categories" method="post" class="flex flex-col items-center h-[100%] w-[100%]">
                    @if(session('error'))
                    <div class="text-red-600 font-bold">
                         {{ session('error') }}
                    </div>
                    @endif


                    @csrf

                    <div class="mb-5 w-full ">

                         <input type="text" placeholder="Enter the categories name" name="category"
                              class="border px-5 border-gray-400 rounded-xl py-2 focus:outline-none w-[100%]" />

                         @error('category')
                         <div class="absolute text-red-400 w-[80%] flex flex-wrap font-thin text-xl">{{$message}}</div>
                         @enderror


                    </div>

                    <button class="bg-blue-600 mt-1 rounded-2xl p-1 hover:bg-blue-500 w-full"
                         type="submit">Add</button>
               </form>

          </div>
          <div class="w-[40%]"><br><br>
               <h1 class="text-3xl text-blue-700 font-bold">Category List</h1><br>

               <ul class="border border-gray-200 overflow-hidden">
                    <li class="font-bold p-2">
                         <ul class="flex justify-between">
                              <li class="w-[30px]">S.No</li>
                              <li class="w-[70px]">Name</li>
                              <li class="w-[70px]">Creator</li>
                              <li class="w-[40px]">Action</li>
                         </ul>
                    </li>

                    @foreach ($categories as $category)
                    <li class="even:bg-gray-200 p-2">
                         <ul class="flex justify-between">
                              <li class="w-[30px]">{{$category->id}}</li>
                              <li class="w-[70px]">{{$category->name}}</li>
                              <li class="w-[70px]">{{$category->creator}}</li>
                              <li class="w-[40px] flex">
                                   <a  href="category/delete/{{$category->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                             width="24px" fill="#000000">
                                             <path
                                                  d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                        </svg> 
                                   </a>
                                   <a  href="quiz-list/{{$category->id}}/{{$category->name}}">
                                           <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#0000F5"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z"/></svg>
                                   </a>
                              </li>
                         </ul>
                    </li>
                    @endforeach
               </ul>
          </div>
     </div>
</body>

</html>