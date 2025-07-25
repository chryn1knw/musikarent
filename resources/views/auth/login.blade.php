<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Musikarent</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-[#1a1a2e] min-h-screen flex items-center justify-center">
    <!-- Only Login Card -->
    <div class="dark-card rounded-lg shadow-xl p-8 mx-4 ">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-indigo-900 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-sign-in-alt text-indigo-400 text-2xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-white mb-2">Masuk ke Musikarent</h2>
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div
                class="mb-4 p-4 bg-green-900 bg-opacity-30 border border-green-400 text-green-200 rounded-md flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">
                    Email
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-3 py-2 dark-input rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="contoh@email.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-400 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">
                    Password
                </label>
                <input id="password" type="password" name="password" required
                    class="w-full px-3 py-2 dark-input rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="••••••••">
                @error('password')
                    <p class="mt-1 text-sm text-red-400 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-600 rounded bg-gray-700">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-300">
                        Ingat saya
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-400 hover:text-indigo-300">
                        Lupa password?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full mt-6 bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md font-medium transition-colors">
                Masuk
            </button>

            <!-- Register Link -->
            <div class="text-center pt-4 border-t border-gray-700 mt-6">
                <p class="text-sm text-gray-400">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-medium">
                        Daftar
                    </a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>