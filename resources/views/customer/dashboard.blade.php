@extends('layouts.main')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="max-w-screen-xl mx-auto px-4">
            <h1 class="text-5xl font-bold mb-4">{{ $heroSection['title'] }}</h1>
            <p class="text-xl mb-8">{{ $heroSection['subtitle'] }}</p>
            <a href="{{ route('customer.instruments.index') }}" class="bg-white text-gray-900 text-lg px-6 py-3 rounded-lg font-medium mr-4 inline-block hover:bg-gray-100 transition-colors">Lihat Alat Musik</a>
            <a href="{{ route('customer.studios.index') }}" class="border border-white text-white text-lg px-6 py-3 rounded-lg font-medium inline-block hover:bg-white hover:text-gray-900 transition-colors">Cek Studio Band</a>
        </div>
    </section>

    <!-- Carousel/Banner Section -->
    <div id="mainCarousel" class="relative overflow-hidden" x-data="carousel" x-init="init()">
        <!-- Carousel Indicators -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
            @foreach($carouselItems as $index => $item)
                <button type="button @click="goTo({{ $index }})" class="w-3 h-3 rounded-full {{ $index == 0 ? 'bg-white' : 'bg-white/50' }} carousel-indicator" data-slide="{{ $index }}"></button>
            @endforeach
        </div>
        
        <!-- Carousel Inner -->
        <div class="relative h-96 md:h-[500px]">
            @foreach($carouselItems as $index => $item)
                <div class="absolute inset-0 transition-opacity duration-500 {{ $index == 0 ? 'opacity-100' : 'opacity-0' }} carousel-item">
                    <img src="{{ $item['image'] }}" class="w-full h-full object-cover" alt="{{ $item['title'] }}">
                    <div class="absolute inset-0 bg-black/40"></div>
                    <div class="absolute bottom-8 left-8 text-white hidden md:block">
                        <h3 class="text-2xl font-bold mb-2">{{ $item['title'] }}</h3>
                        <p class="text-lg">{{ $item['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Carousel Controls -->
        <button type="button" class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black/50 text-white p-2 rounded-full hover:bg-black/70 transition-colors carousel-prev" @click="prev">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button type="button" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black/50 text-white p-2 rounded-full hover:bg-black/70 transition-colors carousel-next" @click="next">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>

    <!-- Featured Instruments Section -->
    <section id="alat-musik" class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900">Alat Musik Populer</h2>
                <div class="mt-2 h-1 w-20 bg-indigo-600 mx-auto"></div>
            </div>
            
            @if($instruments->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($instruments as $instrument)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <div class="relative h-48 overflow-hidden">
                                @if($instrument->photo_url)
                                    <img src="{{ asset('storage/' . $instrument->photo_url) }}" 
                                        class="w-full h-full object-cover" 
                                        alt="{{ $instrument->name }}">
                                @else
                                    <img src="{{ asset('images/no-image.jpg') }}" 
                                        class="w-full h-full object-cover" 
                                        alt="Default image">
                                @endif
                                @if($instrument->status == 'available')
                                    <span class="absolute top-2 right-2 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        Tersedia
                                    </span>
                                @else
                                    <span class="absolute top-2 right-2 bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        Tidak Tersedia
                                    </span>
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-medium text-gray-900 mb-1">{{ $instrument->name }}</h3>
                                <p class="text-sm text-gray-500 mb-2">{{ $instrument->brand }} - {{ $instrument->category->name ?? '-' }}</p>
                                <p class="text-sm text-gray-600 mb-4">{{ Str::limit($instrument->description, 80) }}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-semibold text-indigo-600">Rp {{ number_format($instrument->price_per_day, 0, ',', '.') }}/hari</span>
                                    @if($instrument->status == 'available')
                                        <a href="#" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 no-underline">
                                            Sewa
                                        </a>
                                    @else
                                        <button class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-gray-600 bg-gray-100 cursor-not-allowed" disabled>
                                            Tidak Tersedia
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-8">
                    <a href="{{ route('customer.instruments.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 no-underline">
                        Lihat Semua Alat Musik
                    </a>
                </div>
            @else
                <div class="text-center py-12">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                        </svg>
                        <h3 class="mt-3 text-lg font-medium text-gray-900">Belum ada alat musik tersedia</h3>
                        <p class="mt-1 text-sm text-gray-500">Silakan coba lagi nanti</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Studios Section -->
    <section id="studio" class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900">Studio Band Kami</h2>
                <div class="mt-2 h-1 w-20 bg-indigo-600 mx-auto"></div>
            </div>
            
            @if($studios->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($studios as $studio)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
                            <div class="relative h-48 overflow-hidden">
                                @if($studio->photo_url)
                                    <img src="{{ asset('storage/' . $studio->photo_url) }}" 
                                        class="w-full h-full object-cover" 
                                        alt="{{ $studio->name }}">
                                @else
                                    <img src="{{ asset('images/no-image.jpg') }}" 
                                        class="w-full h-full object-cover" 
                                        alt="Default image">
                                @endif
                                @if($studio->status == 'available')
                                    <span class="absolute top-2 right-2 bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        Tersedia
                                    </span>
                                @else
                                    <span class="absolute top-2 right-2 bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                        Penuh
                                    </span>
                                @endif
                            </div>
                            <div class="p-4 flex-grow flex flex-col">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">{{ $studio->name }}</h3>
                                
                                <div class="flex justify-between items-center mb-3">
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="h-4 w-4 {{ $i <= $studio->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @endfor
                                        <span class="ml-1 text-sm text-gray-500">({{ $studio->rating }}/5)</span>
                                    </div>
                                    <div class="text-sm text-gray-500 flex items-center">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                        {{ $studio->capacity }} orang
                                    </div>
                                </div>
                                
                                <p class="text-sm text-gray-600 mb-4 flex-grow">{{ Str::limit($studio->description, 100) }}</p>
                                
                                @if($studio->features)
                                    <div class="flex flex-wrap gap-1 mb-4">
                                        @foreach(explode(',', $studio->features) as $feature)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                {{ trim($feature) }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                                
                                <div class="flex justify-between items-center mt-auto">
                                    <span class="text-lg font-semibold text-indigo-600">Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}/jam</span>
                                    <a href="{{ route('customer.studios.show', $studio) }}" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white {{ $studio->status == 'available' ? 'bg-green-600 hover:bg-green-700' : 'bg-gray-400' }} focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $studio->status == 'available' ? 'focus:ring-green-500' : 'focus:ring-gray-500' }} no-underline">
                                        {{ $studio->status == 'available' ? 'Booking' : 'Penuh' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-8">
                    <a href="{{ route('customer.studios.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 no-underline">
                        Lihat Semua Studio
                    </a>
                </div>
            @else
                <div class="text-center py-12">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <h3 class="mt-3 text-lg font-medium text-gray-900">Belum ada studio tersedia</h3>
                        <p class="mt-1 text-sm text-gray-500">Silakan coba lagi nanti</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- How To Rent Section -->
    <section id="cara-sewa" class="py-12">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-center text-3xl font-bold text-gray-900 mb-10">Cara Sewa</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($rentSteps as $index => $step)
                    <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                        <div class="mb-4">
                            <div class="bg-blue-600 text-white inline-flex justify-center items-center rounded-full w-15 h-15">
                                <h3 class="text-2xl font-bold m-0">{{ $index + 1 }}</h3>
                            </div>
                        </div>
                        <div>
                            <h5 class="text-lg font-semibold mb-2">{{ $step['title'] }}</h5>
                            <p class="text-sm text-gray-600">{{ $step['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimoni" class="py-12 bg-gray-50">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-center text-3xl font-bold text-gray-900 mb-10">Kata Mereka</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($testimonials as $testimonial)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-center mb-4">
                            <img src="{{ $testimonial['avatar'] }}" alt="{{ $testimonial['name'] }}" class="w-12 h-12 rounded-full object-cover mr-3">
                            <div>
                                <h5 class="font-semibold text-gray-900">{{ $testimonial['name'] }}</h5>
                                <p class="text-sm text-gray-500">{{ $testimonial['role'] }}</p>
                            </div>
                        </div>
                        <div class="flex mb-3">
                            @for($i = 0; $i < 5; $i++)
                                @if($i < $testimonial['rating'])
                                    <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endif
                            @endfor
                        </div>
                        <p class="text-sm text-gray-600">"{{ $testimonial['comment'] }}"</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-12">
        <div class="max-w-screen-xl mx-auto px-4">
            <h2 class="text-center text-3xl font-bold text-gray-900 mb-10">Hubungi Kami</h2>
            <div class="flex justify-center">
                <div class="w-full max-w-4xl">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <form>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="name" placeholder="Nama Lengkap">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="email" placeholder="email@example.com">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                                    <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="phone" placeholder="08xxxxxxxxxx">
                                </div>
                                <div>
                                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                                    <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="subject">
                                        <option disabled selected>Pilih Subjek</option>
                                        <option>Sewa Alat Musik</option>
                                        <option>Booking Studio</option>
                                        <option>Informasi Lainnya</option>
                                    </select>
                                </div>
                                <div class="md:col-span-2">
                                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                                    <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" id="message" rows="5" placeholder="Tulis pesan Anda di sini..."></textarea>
                                </div>
                                <div class="md:col-span-2 text-center">
                                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        @foreach($contactInfo as $info)
                            <div class="text-center">
                                <div class="inline-block p-4 rounded-full bg-blue-600 text-white mb-4">
                                    <i class="{{ $info['icon'] }} text-xl"></i>
                                </div>
                                <h5 class="text-lg font-semibold text-gray-900 mb-2">{{ $info['title'] }}</h5>
                                <p class="text-gray-600">{{ $info['value'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection