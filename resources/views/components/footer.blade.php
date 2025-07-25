<footer class="bg-gray-900 text-white py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <div>
                <h5 class="text-lg font-semibold mb-3">{{ $siteInfo['name'] }}</h5>
                <p class="text-sm text-gray-300">{{ $siteInfo['slogan'] }}</p>
            </div>
            <div>
                <h5 class="text-lg font-semibold mb-3">Jam Operasional</h5>
                <p class="text-sm text-gray-300">Senin - Jumat: 09.00 - 22.00</p>
                <p class="text-sm text-gray-300">Sabtu - Minggu: 10.00 - 23.00</p>
            </div>
            <div class="flex flex-col items-center md:items-end">
                <h5 class="text-lg font-semibold mb-3">Sosial Media</h5>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-youtube"></i></a>
                </div>
                <p class="text-sm text-gray-400 mt-3">&copy; {{ date('Y') }} {{ $siteInfo['name'] }}. Hak Cipta
                    Dilindungi.</p>
            </div>
        </div>
    </div>
</footer>