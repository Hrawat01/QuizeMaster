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
                Quiz List
     
            <a class="text-yellow-300 text-xl" href="/add-quiz">Back Quiz</a>
        </h1>

        <div class="w-full max-w-2xl">
            <ul class="border border-gray-200">
                <li class="font-bold p-2 bg-gray-100">
                    <div class="flex justify-between">
                        <span class="w-[60px]">MCQ Id</span>
                        <span class="w-[300px]">Question</span>
                    </div>
                </li>

                @foreach ($mcqs as $mcq)
                    <li class="even:bg-gray-200 p-2">
                        <div class="flex justify-between flex-wrap">
                            <span class="w-[60px]">{{ $mcq->id }}</span>
                            <span class="w-[300px]">{{ $mcq->question }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>