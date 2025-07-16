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

<body class="gradient-bg min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            <!-- Welcome Card -->
            <div class="bg-white rounded-lg shadow-xl p-8 text-center card-hover transition-all duration-300">
                <!-- Logo/Icon -->
                <div class="mb-6">
                    <div
                        class="w-20 h-20 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-4 animate-float">
                        <i class="fas fa-music text-white text-3xl"></i>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900">Musikarent</h1>
                    <p class="text-gray-600 mt-2">Platform Rental Alat Musik & Studio</p>
                </div>

                <!-- Welcome Message -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-3">Selamat Datang!</h2>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Untuk melanjutkan dan menikmati layanan kami, silakan pilih salah satu opsi di bawah ini
                    </p>
                </div>

                <!-- Auth Options -->
                <div class="space-y-4">
                    <!-- Register Button -->
                    <a href="{{ route('register') }}"
                        class="w-full bg-indigo-600 text-white py-3 px-6 rounded-lg font-medium hover:bg-indigo-700 transition-all duration-300 btn-hover flex items-center justify-center space-x-2 no-underline">
                        <i class="fas fa-user-plus"></i>
                        <span>Daftar Akun Baru</span>
                    </a>

                    <!-- Login Button -->
                    <a href="{{ route('login') }}"
                        class="w-full bg-white text-indigo-600 py-3 px-6 rounded-lg font-medium border-2 border-indigo-600 hover:bg-indigo-50 transition-all duration-300 btn-hover flex items-center justify-center space-x-2 no-underline">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Masuk ke Akun</span>
                    </a>
                </div>

                <!-- Additional Info -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-xs text-gray-500">
                        Belum punya akun?
                        <a href="{{ route('register') }}"
                            class="text-indigo-600 hover:text-indigo-700 font-medium">Daftar sekarang</a>
                        dan nikmati layanan terbaik kami!
                    </p>
                </div>
            </div>

            <!-- Footer Info -->
            <div class="text-center mt-6">
                <p class="text-white text-sm opacity-80">
                    &copy; 2025 Musikarent. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>

</html>