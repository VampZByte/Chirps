<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Rental | Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center min-h-screen flex items-center justify-center" style="background-image: url('{{ asset('image/back.jpg') }}');">



    <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username">
                @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" type="password" name="password" required autocomplete="new-password">
                @error('password') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-blue-600 hover:underline" href="{{ route('login') }}">
                    Already registered?
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Register
                </button>
            </div>
        </form>
    </div>
</body>
</html>
