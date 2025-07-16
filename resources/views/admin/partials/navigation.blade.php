<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <span class="text-white font-bold">Music Rental Admin</span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-admin-nav-link :href="route('admin.dashboard')"
                            :active="request()->routeIs('admin.dashboard')">
                            {{ __('Dashboard') }}
                        </x-admin-nav-link>
                        <x-admin-nav-link :href="route('admin.categories.index')"
                            :active="request()->routeIs('admin.categories.*')">
                            {{ __('Categories') }}
                        </x-admin-nav-link>
                        <x-admin-nav-link :href="route('admin.instruments.index')"
                            :active="request()->routeIs('admin.instruments.*')">
                            {{ __('Instruments') }}
                        </x-admin-nav-link>
                        <x-admin-nav-link :href="route('admin.studios.index')"
                            :active="request()->routeIs('admin.studios.*')">
                            {{ __('Studios') }}
                        </x-admin-nav-link>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                <span class="sr-only">Open user menu</span>
                                {{ Auth::user()->name }}
                                <i class="fas fa-chevron-down ml-1"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </div>
    </div>
</nav>