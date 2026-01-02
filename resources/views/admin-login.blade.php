<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>
<style>
    .glowbtn:hover {
        box-shadow: 0 10px 25px rgba(186, 135, 165, 0.7);
    }
</style>

<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Navbar -->
    <x-user-nav></x-user-nav>

    <!-- Centered Container -->
    <div class="flex flex-1 items-center justify-center">
        <div class="bg-white p-8 shadow-lg rounded-2xl w-full max-w-md glowbtn">
            
            <!-- Title -->
            <h1 class="text-3xl text-blue-700 font-bold text-center mb-6">Admin Login</h1>

            <!-- Form -->
            <form action="/admin-login" method="post" class="space-y-5">
                @csrf

                <!-- Admin Name -->
                <div>
                    <label class="block font-semibold mb-1">Admin Name</label>
                    <input type="text" name="name" placeholder="Enter the admin name"
                        class="w-full border border-gray-300 rounded-xl px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block font-semibold mb-1">Password</label>
                    <input type="password" name="password" placeholder="Enter the password"
                        class="w-full border border-gray-300 rounded-xl px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-600 text-white font-semibold rounded-xl py-2 hover:bg-blue-700 transition duration-200">
                    Login
                </button>
            </form>
        </div>
    </div>
</body>
</html>