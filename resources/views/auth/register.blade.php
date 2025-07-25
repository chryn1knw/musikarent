<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Musikarent</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-[#1a1a2e] min-h-screen flex items-center justify-center p-4">
    <!-- Register Card -->
    <div class="dark-card text-white border border-[#2d3748] w-full max-w-md rounded-lg shadow-xl p-8">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-indigo-900 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-user-plus text-indigo-400 text-2xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-white mb-2">Daftar Akun Baru</h2>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">
                    Nama Lengkap
                </label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full px-3 py-2 bg-[#2d3748] border border-[#4a5568] text-white rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="Masukkan nama lengkap">
                @error('name')
                    <p class="mt-1 text-sm text-red-400 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">
                    Email
                </label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-3 py-2 bg-[#2d3748] border border-[#4a5568] text-white rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="contoh@email.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-400 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-300 mb-1">
                    No. Telepon
                </label>
                <input id="phone" type="text" name="phone" value="{{ old('phone') }}"
                    class="w-full px-3 py-2 bg-[#2d3748] border border-[#4a5568] text-white rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="08xxxxxxxxxx">
                @error('phone')
                    <p class="mt-1 text-sm text-red-400 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-sm font-medium text-gray-300 mb-1">
                    Alamat
                </label>
                <textarea id="address" name="address" rows="3"
                    class="w-full px-3 py-2 bg-[#2d3748] border border-[#4a5568] text-white rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500 resize-none"
                    placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
                @error('address')
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
                    class="w-full px-3 py-2 bg-[#2d3748] border border-[#4a5568] text-white rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="Minimal 8 karakter">
                @error('password')
                    <p class="mt-1 text-sm text-red-400 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">
                    Konfirmasi Password
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full px-3 py-2 bg-[#2d3748] border border-[#4a5568] text-white rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500"
                    placeholder="Ulangi password">
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-400 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full mt-6 bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md font-medium transition-colors">
                Daftar Sekarang
            </button>

            <!-- Login Link -->
            <div class="text-center pt-4 border-t border-gray-700 mt-6">
                <p class="text-sm text-gray-400">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-medium">
                        Masuk di sini
                    </a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>