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
        <h1 class="text-4xl text-green-700 font-bold text-center mb-6">
            Category Name :{{ $quizName }}
        </h1>
<h2 class="text-lg text-green-700 font-bold text-center mb-6">This Quiz contain {{ $quizCount }} question and no limit to attempt this Quiz</h2>
<div class=" text-2xl text-green-700 font-bold text-center mb-6">Good Luck !</div>


    <a href="/user-signup"
                    class=" p-4 bg-blue-600 text-white font-semibold rounded-xl py-2 hover:bg-blue-700 transition duration-200">
                    Login/Signup
    </a>
      
    </div>
</body>
</html>