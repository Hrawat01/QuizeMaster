<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Details Page</title>
    @vite('resources/css/app.css')
</head>
 
<body>
    <x-user-nav></x-user-nav>
    <div class="flex flex-col min-h-screen items-center bg-gray-100 ">
        <h1 class="text-3xl text-green-900 font-bold p-5">Attempted Quiz</h1>
        
          <div class="w-[50%]"><br><br>
               <ul class="border border-gray-200 overflow-hidden">
                    <li class="font-bold p-2">
                         <ul class="flex justify-between">
                              <li class="w-[30px]">S.No</li>
                              <li class="w-[70px]">Name</li>            
                              <li class="w-[40px]">Status</li>
                         </ul>
                    </li>

                    @foreach ($quizRecord as $key=>$record)
                    <li class="even:bg-gray-200 p-2">
                         <ul class="flex justify-between">
                              <li>{{$key+1}}</li>
                              <li>{{$record->name}}</li>
                              <li>{{$record->status}}</li>
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