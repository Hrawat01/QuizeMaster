<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz Result</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-nav></x-user-nav>
    <div class="flex flex-col min-h-screen items-center bg-gray-100 ">
        <h1 class="text-3xl text-green-900 font-bold p-5">Quiz Result</h1>
          <div class="w-[60%]"><br><br>
               <h1 class="text-2xl font-bold text-green-900 text-center my-3">{{ $resultCount }} out of {{ $resultData->count() }} Correct</h1><br>

               <ul class="border border-gray-200 overflow-hidden">
                    <li class="font-bold p-2">
                         <ul class="flex justify-between">
                              <li class="w-[30px]">S.No</li>
                              <li >Question</li>
                              <li class="w-[70px]">Result</li>                 
                         </ul>
                    </li>

                    @foreach ($resultData as $key=>$item)
                    <li class="even:bg-gray-200 p-2">
                         <ul class="flex justify-between">
                              <li class="w-[30px]">{{$key+1}}</li>
                               <li >{{$item->question}}</li>
                               @if ($item->is_correct == 1)
                               <li class="w-[70px] text-green-600 font-bold">Correct</li>
                               @else
                               <li class="w-[70px] text-red-600 font-bold">Incorrect</li>
                               @endif
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