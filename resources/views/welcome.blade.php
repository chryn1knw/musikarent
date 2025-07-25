<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Musikarent</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-[#1a1a2e] min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full">
        <!-- Welcome Card -->
        <div class="dark-card text-white border border-[#2d3748] rounded-lg shadow-xl p-8">
            <!-- Logo/Icon -->
            <div class="mb-6 text-center">
                <div class="w-20 h-20 bg-indigo-900 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-music text-indigo-400 text-3xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-white">Musikarent</h1>
                <p class="text-indigo-200 mt-2">Platform Rental Alat Musik & Studio</p>
            </div>

            <!-- Welcome Message -->
            <div class="mb-8 text-center">
                <h2 class="text-xl font-semibold text-white mb-3">Selamat Datang!</h2>
                <p class="text-indigo-200 text-sm leading-relaxed">
                    Untuk melanjutkan dan menikmati layanan kami, silakan pilih salah satu opsi di bawah ini
                </p>
            </div>

            <!-- Auth Options -->
            <div class="space-y-4">
                <!-- Register Button -->
                <a href="{{ route('register') }}"
                    class="w-full bg-indigo-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-300 flex items-center justify-center space-x-2 no-underline">
                    <i class="fas fa-user-plus"></i>
                    <span>Daftar Akun Baru</span>
                </a>

                <!-- Login Button -->
                <a href="{{ route('login') }}"
                    class="w-full bg-transparent text-indigo-400 py-3 px-6 rounded-lg font-medium border-2 border-indigo-600 hover:bg-indigo-900 hover:bg-opacity-30 transition-colors duration-300 flex items-center justify-center space-x-2 no-underline">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Masuk ke Akun</span>
                </a>
            </div>

            <!-- Additional Info -->
            <div class="mt-8 pt-6 border-t border-gray-700 text-center">
                <p class="text-xs text-gray-400">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-medium">
                        Daftar sekarang
                    </a>
                    dan nikmati layanan terbaik kami!
                </p>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="text-center mt-6">
            <p class="text-gray-400 text-sm">
                &copy; {{ date('Y') }} Musikarent. All rights reserved.
            </p>
        </div>
    </div>
</body>

</html>