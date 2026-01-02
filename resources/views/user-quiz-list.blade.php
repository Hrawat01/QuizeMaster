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
    <x-user-nav></x-user-nav>

    <div class="flex flex-col min-h-[98%] items-center pt-5">
        <h1 class="text-2xl text-green-700 font-bold text-center mb-6">
            Category Name : {{$category}}
          
        </h1>

        <div class="w-[60%] ">
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
                            <span > <a class="text-green-500 font-bold" href="/show-quiz/{{$item->id}}">Attempt Quiz
                                   </a></span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>