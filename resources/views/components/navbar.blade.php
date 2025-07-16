<nav class="bg-gray-900 text-white sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Brand -->
            <a href="#" class="flex items-center text-white hover:text-gray-200 transition-colors"
                style="text-decoration: none;">
                <i class="fas fa-guitar mr-2"></i>
                {{ $siteInfo['name'] }}
            </a>

            <!-- Mobile menu button -->
            <button
                class="md:hidden flex items-center px-3 py-2 border rounded text-gray-200 border-gray-400 hover:text-white hover:border-white transition-colors"
                type="button" onclick="toggleMobileMenu()">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>

            <!-- Desktop Menu -->
            <div class="hidden md:flex md:items-center md:space-x-6">
                <a href="/dashboard"
                    class="nav-link {{ request()->is('/') ? 'text-blue-400' : 'text-white hover:text-gray-200' }} transition-colors duration-200"
                    id="beranda-link">
                    Beranda
                </a>

                <a href="#"
                    class="nav-link {{ request()->is('instruments*') ? 'text-blue-400' : 'text-white hover:text-gray-200' }} transition-colors duration-200"
                    data-scroll="alat-musik">
                    Alat Musik
                </a>

                <a href="#"
                    class="nav-link {{ request()->is('studios*') ? 'text-blue-400' : 'text-white hover:text-gray-200' }} transition-colors duration-200"
                    data-scroll="studio">
                    Studio Band
                </a>

                <a href="#" class="nav-link text-white hover:text-gray-200 transition-colors duration-200"
                    data-scroll="cara-sewa">
                    Cara Sewa
                </a>

                <a href="#" class="nav-link text-white hover:text-gray-200 transition-colors duration-200"
                    data-scroll="testimoni">
                    Testimoni
                </a>

                <a href="#" class="nav-link text-white hover:text-gray-200 transition-colors duration-200"
                    data-scroll="kontak">
                    Kontak
                </a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="text-white hover:text-gray-200 transition-colors duration-200 bg-transparent border-none cursor-pointer">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Mobile Menu (hidden by default) -->
        <div id="mobile-menu" class="md:hidden hidden pb-4">
            <div class="flex flex-col space-y-2">
                <a href="/dashboard"
                    class="nav-link {{ request()->is('/') ? 'text-blue-400' : 'text-white hover:text-gray-200' }} transition-colors duration-200 py-2"
                    id="beranda-link">
                    Beranda
                </a>

                <a href="#"
                    class="nav-link {{ request()->is('instruments*') ? 'text-blue-400' : 'text-white hover:text-gray-200' }} transition-colors duration-200 py-2"
                    data-scroll="alat-musik">
                    Alat Musik
                </a>

                <a href="#"
                    class="nav-link {{ request()->is('studios*') ? 'text-blue-400' : 'text-white hover:text-gray-200' }} transition-colors duration-200 py-2"
                    data-scroll="studio">
                    Studio Band
                </a>

                <a href="#" class="nav-link text-white hover:text-gray-200 transition-colors duration-200 py-2"
                    data-scroll="cara-sewa">
                    Cara Sewa
                </a>

                <a href="#" class="nav-link text-white hover:text-gray-200 transition-colors duration-200 py-2"
                    data-scroll="testimoni">
                    Testimoni
                </a>

                <a href="#" class="nav-link text-white hover:text-gray-200 transition-colors duration-200 py-2"
                    data-scroll="kontak">
                    Kontak
                </a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="text-white hover:text-gray-200 transition-colors duration-200 bg-transparent border-none cursor-pointer text-left py-2">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    }
</script>