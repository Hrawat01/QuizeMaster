<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQs</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <x-user-nav></x-user-nav>

    <div class="flex flex-col items-center pt-8 px-4 mb-6">

        <!-- Header -->
        <h1 class="text-4xl font-bold text-green-700 mb-2 text-center">
            Java MCQs
        </h1>

        <h2 class="text-xl font-semibold text-green-600 mb-8 text-center">
            Question Number : 1
        </h2>

        <!-- Question Card -->
        <div class="w-full max-w-3xl bg-white rounded-2xl shadow-xl p-5 text-gray-800">

            <h1 class="text-2xl font-bold mb-5">
                Q1. What is Java?
            </h1>

            <form class="space-y-4">

                <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-green-50 border-green-300">
                    <input type="radio" name="answer" >
                    <span class="text-lg">Programming language</span>
                </label>

                <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-green-50 border-green-300">
                    <input type="radio" name="answer" >
                    <span class="text-lg">Operating system</span>
                </label>

                <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-green-50 border-green-300">
                    <input type="radio" name="answer">
                    <span class="text-lg">Database software</span>
                </label>
              
              
                <label class="flex items-center gap-3 p-4 border rounded-xl cursor-pointer hover:bg-green-50 border-green-300">
                    <input type="radio" name="answer" >
                    <span class="text-lg">Database software</span>
                </label>

            </form>
            <br>

            <button class="w-full rounded-2xl font-bold  text-center bg-green-600 p-3">Submit & Next</button>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>
</html>
