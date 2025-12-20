<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class=" bg-gray-200">

    <nav class="bg-gray-100 shadow-lg px-5 py-5 m-2">
        <div class="flex justify-between item-center">
            <div class="font-bold text-[20px] hover:text-green-500">Quiz System</div>
            <div class="flex gap-5">
                <a class="text-gray-700 hover:text-blue-500" href="">Categories</a>
                <a class="text-gray-700 hover:text-blue-500" href="">Quiz</a>
                <a class="text-gray-700 hover:text-blue-500" href="">Wellcome,{{$name}}</a>
                <a class="text-gray-700 hover:text-blue-500" href="">Login</a>
            </div>
        </div>
    </nav>
</body>

</html>