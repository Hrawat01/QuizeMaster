<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <x-user-nav></x-user-nav>

    <!-- Centered Container -->
    <div class="flex flex-1 items-center justify-center px-4">
        <div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-8 transition hover:shadow-2xl">

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-gray-800">Create Account</h1>
                <p class="text-gray-500 mt-1">Sign up to get started </p>
            </div>

            <!-- Form -->
            <form action="/user-signup" method="post" class="space-y-5">
                @csrf

                <!-- Username -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">User Name</label>
                    <input
                        type="text"
                        name="name"
                        placeholder="Enter your name"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Email</label>
                    <input
                        type="email"
                        name="email"
                        placeholder="Enter your email"
                        required
                        class="w-full rounded-xl border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Password</label>
                    <div class="relative">
        <input
            id="password"
            type="password"
            name="password"
            placeholder="••••••••"
            required
            class="w-full rounded-xl border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
        />

        <button
            type="button"
            onclick="togglePassword('password','eyeOpen1','eyeClose1')"
            class="absolute right-3 top-2.5 opacity-60 hover:opacity-100"
        >
                               <!-- Eye icon -->
                            <svg id="eyeOpen1" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm.1-83.87q-40.01 0-68.12-28.01-28.11-28.01-28.11-68.02 0-40.01 28.01-68.12 28.01-28.11 68.02-28.11 40.01 0 68.12 28.01 28.11 28.01 28.11 68.02 0 40.01-28.01 68.12-28.01 28.11-68.02 28.11Zm-.1 221.39q-152.78 0-277.02-87.15Q78.74-356.78 22.48-500q56.26-143.22 180.5-230.37Q327.22-817.52 480-817.52q152.78 0 277.02 87.15Q881.26-643.22 937.52-500q-56.26 143.22-180.5 230.37Q632.78-182.48 480-182.48Z"/></svg>

                            <!-- Eye off icon -->
                            <svg id="eyeClose1" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000" class="hidden"><path d="M785.22-49.22 627.39-205.61q-33.87 11.57-70.5 17.35-36.63 5.78-76.89 5.78-154.96 0-277.76-86.89Q79.43-356.26 22.48-500q20.43-51.87 53-99.35 32.56-47.48 72.43-85.74L40.17-793.7l62.22-62.21 744.48 745.04-61.65 61.65ZM480-320q8.17 0 15.41-.72 7.24-.71 15.42-3.15L302.74-530.83q-1.87 8.18-2.31 15.7-.43 7.52-.43 15.13 0 75 52.5 127.5T480-320Zm310.09 24.22L647.83-437.61q5.87-14.17 9.02-30.83Q660-485.09 660-500q0-75-52.5-127.5T480-680q-16.04 0-31.56 3.15-15.53 3.15-30.83 9.46L301.48-783.52q41-17 86.26-25.5 45.26-8.5 92.26-8.5 154.39 0 277.2 86.32Q880-644.87 937.52-500q-23 60.13-61.63 112.89t-85.8 91.33Zm-225.13-224.7-68-68q16.13-2.74 29.17 2.24 13.04 4.98 22.7 15.63 9.65 10.65 14.04 23.98 4.39 13.32 2.09 26.15Z"/></svg>

        </button>
    </div>

                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block text-sm font-semibold text-gray-600 mb-1">Confirm Password</label>
                   <div class="relative">
        <input
            id="confirm_password"
            type="password"
            name="password_confirmation"
            placeholder="••••••••"
            required
            class="w-full rounded-xl border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
        />

        <button
            type="button"
            onclick="togglePassword('confirm_password','eyeOpen2','eyeClose2')"
            class="absolute right-3 top-2.5 opacity-60 hover:opacity-100"
        >
                                 <!-- Eye icon -->
                            <svg id="eyeOpen2" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm.1-83.87q-40.01 0-68.12-28.01-28.11-28.01-28.11-68.02 0-40.01 28.01-68.12 28.01-28.11 68.02-28.11 40.01 0 68.12 28.01 28.11 28.01 28.11 68.02 0 40.01-28.01 68.12-28.01 28.11-68.02 28.11Zm-.1 221.39q-152.78 0-277.02-87.15Q78.74-356.78 22.48-500q56.26-143.22 180.5-230.37Q327.22-817.52 480-817.52q152.78 0 277.02 87.15Q881.26-643.22 937.52-500q-56.26 143.22-180.5 230.37Q632.78-182.48 480-182.48Z"/></svg>

                            <!-- Eye off icon -->
                            <svg id="eyeClose2" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000" class="hidden"><path d="M785.22-49.22 627.39-205.61q-33.87 11.57-70.5 17.35-36.63 5.78-76.89 5.78-154.96 0-277.76-86.89Q79.43-356.26 22.48-500q20.43-51.87 53-99.35 32.56-47.48 72.43-85.74L40.17-793.7l62.22-62.21 744.48 745.04-61.65 61.65ZM480-320q8.17 0 15.41-.72 7.24-.71 15.42-3.15L302.74-530.83q-1.87 8.18-2.31 15.7-.43 7.52-.43 15.13 0 75 52.5 127.5T480-320Zm310.09 24.22L647.83-437.61q5.87-14.17 9.02-30.83Q660-485.09 660-500q0-75-52.5-127.5T480-680q-16.04 0-31.56 3.15-15.53 3.15-30.83 9.46L301.48-783.52q41-17 86.26-25.5 45.26-8.5 92.26-8.5 154.39 0 277.2 86.32Q880-644.87 937.52-500q-23 60.13-61.63 112.89t-85.8 91.33Zm-225.13-224.7-68-68q16.13-2.74 29.17 2.24 13.04 4.98 22.7 15.63 9.65 10.65 14.04 23.98 4.39 13.32 2.09 26.15Z"/></svg>

        </button>
    </div>
                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-2.5 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition duration-200"
                >
                    Create Account
                </button>
            </form>

            <!-- Footer -->
            <div class="text-center mt-6 text-sm text-gray-600">
                Already have an account?
                <a href="/admin-login" class="text-blue-600 font-semibold hover:underline">
                    Login
                </a>
            </div>

        </div>
    </div>

{{-- password toggle script --}}
    <script>
function togglePassword(inputId, openEyeId, closeEyeId) {
    const input = document.getElementById(inputId);
    const openEye = document.getElementById(openEyeId);
    const closeEye = document.getElementById(closeEyeId);

    if (input.type === "password") {
        input.type = "text";
        openEye.classList.add("hidden");
        closeEye.classList.remove("hidden");
    } else {
        input.type = "password";
        closeEye.classList.add("hidden");
        openEye.classList.remove("hidden");
    }
}
</script>

</body>
</html>
