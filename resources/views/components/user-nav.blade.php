<nav class="border border-gray-300 rounded bg-gray-100 shadow-lg px-5 py-5 m-2">
    <div class="flex justify-between item-center">
        <div class="font-bold text-[24px] text-green-800 hover:text-blue-500 +">Quiz System</div>
        <div class="flex gap-5">
            <a class="text-green-800 hover:text-blue-500" href="/">Home</a>
            <a class="text-green-800 hover:text-blue-500" href="/categories-list">Categories</a>
            @if (Session::has('user'))
            <a class="text-green-800 hover:text-blue-500" href="/user-details">Welcome , {{ Session('user')->name }}</a>
            <a class="text-green-800 hover:text-blue-500" href="/user-logout">Logout</a>
            @else
            <a class="text-green-800 hover:text-blue-500" href="/user-login">Login</a>
            <a class="text-green-800 hover:text-blue-500" href="/user-signup">Signup</a>
            @endif

            {{-- <a class="text-green-800 hover:text-blue-500" href="/">Blog</a> --}}
        </div>
    </div>

</nav>
{{-- Back button only if NOT on quiz-result route --}}

   
