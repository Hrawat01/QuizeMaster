<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiz Page</title>
     @vite('resources/css/app.css')
</head>
<body class="">
    <x-navbar name={{$name}}> </x-navbar>
     <div class="flex flex-col min-h-[98vh] w-full items-center pt-6">

          <div class="bg-white p-10 shadow-lg rounded-2xl w-full max-w-[40%] ">


            {{-- checking the session  --}}

               @if (!Session('quizDetails'))
                   
            
               <h1 class="text-2xl text-blue-700 pr-5 font-bold text-center">Add Quiz</h1><br><br>
               {{-- if action="admin.." then the path url will be like admin-login/admin-login --}}
               <form action="/add-quiz" method="get" class="flex flex-col items-center h-[100%] w-[100%]">
                    
             
                    
                    <div class="mb-5">
                         
                         <input type="text" placeholder="Enter the Quiz name" name="quiz"
                         class="border px-11 border-gray-400 rounded-xl py-2 focus:outline-none w-[50vh]" 
                         required
                         />
                     
                    </div>


                    <div class="mb-5">
                         
                         <select type="text" name="category_id"
                         class="border px-11 border-gray-400 rounded-xl py-2 focus:outline-none w-[50vh]">

                         @foreach ($categories as $val)
                         <option value={{$val->id}}>{{$val->name}}</option>
                         @endforeach

                    </select>
                     
                    </div>
                
                    <button class="w-[70%] bg-blue-600 mt-1 rounded-2xl p-1" type="submit">Add</button>
               </form>






               @else
               <span class="text-green-500 font-bold">Quiz : {{Session('quizDetails')->name}}</span>
               <h2 class="text-2xl text-center text-gray-800 mb-6 font-bold">Add MCQs</h2>

               {{-- form --}}
               <form action="add-mcq" method="post" class="space-y-4">
                <div>
                    @csrf

                    <textarea type="text" placeholder="Enter the question name" name="question"
                     class="border px-5 border-gray-400 rounded-xl py-2 h-[13vh] focus:outline-none w-full" ></textarea>
                     @error("question")
                          <div class="text-red-600 text-sm">{{$message}} </div>
                     @enderror
                </div>

                {{-- options --}}

                <div>
                    <input type="text" placeholder="Enter the first option" name="a"
                     class="border px-5 border-gray-400 rounded-xl py-2 focus:outline-none w-full" />
                </div>
                  @error("a")
                          <div class="text-red-600 text-sm">{{$message}} </div>
                     @enderror


                <div>
                    <input type="text" placeholder="Enter the second option" name="b"
                     class="border px-5 border-gray-400 rounded-xl py-2 focus:outline-none w-full" />
                </div>
                  @error("b")
                          <div class="text-red-600 text-sm">{{$message}} </div>
                     @enderror


                <div>
                    <input type="text" placeholder="Enter the third option " name="c"
                     class="border px-5 border-gray-400 rounded-xl py-2 focus:outline-none w-full" />
                </div>
                  @error("c")
                          <div class="text-red-600 text-sm">{{$message}} </div>
                     @enderror


                <div>
                    <input type="text" placeholder="Enter the fourth option " name="d"
                     class="border px-5 border-gray-400 rounded-xl py-2 focus:outline-none w-full" />
                </div>
                  @error("d")
                          <div class="text-red-600 text-sm">{{$message}} </div>
                     @enderror

                
                <div>
                    <select name="correct_ans"
                     class="border px-5 border-gray-400 rounded-xl py-2 focus:outline-none w-full font-bold" >
                     <option value="">Select Right Answer </option>
                     <option value="a">A</option>
                     <option value="b">B</option>
                     <option value="c">C</option>
                     <option value="d">D</option>
                </select>
                  @error("correct_ans")
                          <div class="text-red-600 text-sm">{{$message}} </div>
                     @enderror

                 <button name="submit" value="add-more" class="w-[100%] hover:bg-blue-500 text-white font-bold bg-blue-600 mt-3 rounded-2xl p-2" type="submit">Add More</button>
                 <button name="submit" value="done" class="w-[100%] hover:bg-green-500 text-white font-bold bg-green-600 mt-3 rounded-2xl p-2" type="submit">Add and Submit</button>
                 <button name="submit" value="back" class="w-[100%] hover:bg-red-500 text-white font-bold bg-red-600 mt-3 rounded-2xl p-2" type="submit">Finish and Leave</button>
                </div>


               </form>
                  @endif
          </div>
     </div>
</body>
</html>