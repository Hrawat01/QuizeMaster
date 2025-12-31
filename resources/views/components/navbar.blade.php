 <nav class="border border-gray-300 rounded bg-gray-100 shadow-lg px-5 py-5 m-2">
        <div class="flex justify-between item-center">
            <div class="font-bold text-[20px] hover:text-green-500">Quiz System</div>
            <div class="flex gap-5">
                <a class="text-gray-700 hover:text-blue-500" href="/dashboard">Dashboard</a>
                <a class="text-gray-700 hover:text-blue-500" href="/admin-categories">Categories</a>
                <a class="text-gray-700 hover:text-blue-500" href="/add-quiz">Quiz</a>
                <a class="text-gray-700 hover:text-blue-500" href="">Wellcome,{{$name}}</a>
                {{-- <a class="text-gray-700 hover:text-blue-500" href="">Wellcome,</a> --}}
                <a class="text-gray-700 hover:text-blue-500" href="/admin-logout">Logout</a>
            </div>
        </div>
    </nav>