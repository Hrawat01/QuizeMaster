<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz Page</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-nav></x-user-nav>
    <div class="flex flex-col min-h-screen items-center bg-gray-100 ">
        <h1 class="text-3xl text-green-900 font-bold p-5">Check Your Skills</h1>
        <div class="w-full max-w-md ">
            <div class="relative">
                <input
                class="w-full px-4 py-3 text-gray-700 border border-gray-300 rounded-2xl shadow"
                type="text"
                placeholder="Search Quiz...">
                <button class="absolute right-2 top-4">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#48752C"><path d="m788.48-81.56-256.95-257.4q-29.31 20.74-70.83 33.4-41.53 12.65-87.09 12.65-120.53 0-204.53-84.03-83.99-84.03-83.99-204.61 0-120.58 84.02-204.49 84.03-83.92 204.61-83.92 120.58 0 204.5 84 83.91 83.99 83.91 204.53 0 46.13-11.93 85.43-11.94 39.3-33.68 69.61l258.39 258.96-86.43 85.87Zm-415.1-334.31q70.24 0 118.02-47.54 47.77-47.55 47.77-117.79 0-70.25-47.77-118.02Q443.62-747 373.38-747q-70.25 0-117.79 47.78-47.55 47.77-47.55 118.02 0 70.24 47.55 117.79 47.54 47.54 117.79 47.54Z"/></svg>
                </button>
            </div>
             </div>
          <div class="w-[50%]"><br><br>
               <h1 class="text-2xl font-bold text-green-900 text-center my-3">Category List</h1><br>

               <ul class="border border-gray-200 overflow-hidden">
                    <li class="font-bold p-2">
                         <ul class="flex justify-between">
                              <li class="w-[30px]">S.No</li>
                              <li class="w-[70px]">Name</li>
                              <li class="w-[70px]">Quiz Count</li>                 
                              <li class="w-[40px]">Action</li>
                         </ul>
                    </li>

                    @foreach ($categories as $key=>$category)
                    <li class="even:bg-gray-200 p-2">
                         <ul class="flex justify-between">
                              <li class="w-[30px]">{{$key+1}}</li>
                              <li class="w-[70px]">{{$category->name}}</li>
                              <li class="w-[70px]">{{$category->quizzes_count}}</li>
                              <li class="w-[40px] flex">
                                   <a  href="user-quiz-list/{{$category->id}}/{{$category->name}}">
                                           <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#006400"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z"/></svg>
                                   </a>
                              </li>
                         </ul>
                    </li>
                    @endforeach
               </ul>
          </div>
        </div>
        <x-footer-user></x-footer-user>
    </div>
</body>

</html>