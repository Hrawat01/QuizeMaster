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
    <x-navbar name="{{ $name }}"></x-navbar>

    <div class="flex flex-col min-h-[98%] items-center pt-5">
        <h1 class="text-2xl text-blue-700 font-bold text-center mb-6">
            Category Name : {{$category}}
            <a class="text-yellow-300 text-xl" href="/add-quiz">Back Quiz</a>
        </h1>

        <div class="w-[80%] ">
            <ul class="border border-gray-200">
                <li class="font-bold p-2 bg-gray-100">
                    <ul class="flex justify-between">
                        <li class="w-[60px]">Quiz Id</li>
                        <li class="w-[60px]">Name</li>
                        <li class="w-[60px]">Action</li>
                    </ul>
                </li>

                @foreach ($quizData as $item)
                    <li class="even:bg-gray-200 p-2">
                        <div class="flex justify-between ">
                            <span class="w-[33%]">{{ $item->id }}</span>
                            <span class="w-[33%]">{{ $item->name }}</span>
                            <span class="w-[33%]"> <a  href="/show-quiz/{{$item->id}}">
                                           <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#0000F5"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Z"/></svg>
                                   </a></span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>