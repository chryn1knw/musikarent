@extends('layouts.main')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                    <!-- Card Header -->
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-white">
                        <h3 class="text-lg font-medium text-gray-900">Detail Alat Musik</h3>
                        <a href="{{ route('customer.instruments.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Kembali
                        </a>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <div class="flex flex-col md:flex-row gap-6">
                            <!-- Image and Status -->
                            <div class="md:w-2/5">
                                <img src="{{ $instrument->photo_url ? asset('storage/' . $instrument->photo_url) : asset('images/no-image.jpg') }}"
                                    alt="{{ $instrument->name }}" class="w-full h-auto rounded-lg shadow-md mb-4">

                                <div class="flex justify-between items-center mb-4">
                                    <h4 class="text-sm font-medium text-gray-700">Status:</h4>
                                    @if($instrument->status === 'available')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                            Tersedia
                                        </span>
                                    @elseif($instrument->status === 'rented')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                            Disewa
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                            Maintenance
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Instrument Details -->
                            <div class="md:w-3/5">
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $instrument->name }}</h2>
                                <p class="text-xl text-indigo-600 font-semibold mb-4">
                                    Rp {{ number_format($instrument->price_per_day, 0, ',', '.') }}/hari
                                </p>

                                <div class="space-y-4 mb-4">
                                    <div class="flex items-start">
                                        <div class="w-1/3 text-sm font-medium text-gray-500">Kategori</div>
                                        <div class="w-2/3 text-sm text-gray-900">
                                            {{ $instrument->category->name ?? '-' }}
                                        </div>
                                    </div>

                                    <div class="flex items-start">
                                        <div class="w-1/3 text-sm font-medium text-gray-500">Brand/Merek</div>
                                        <div class="w-2/3 text-sm text-gray-900">
                                            {{ $instrument->brand ?? '-' }}
                                        </div>
                                    </div>

                                    <div class="flex items-start">
                                        <div class="w-1/3 text-sm font-medium text-gray-500">Stok</div>
                                        <div class="w-2/3 text-sm text-gray-900">
                                            {{ $instrument->stock }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6">
                                    <h4 class="text-sm font-medium text-gray-700 mb-2">Deskripsi</h4>
                                    <p class="text-sm text-gray-600">
                                        {{ $instrument->description ?: 'Tidak ada deskripsi.' }}
                                    </p>
                                </div>

                                @if($instrument->status === 'available')
                                    <div class="mt-8">
                                        <button type="button" class="w-full flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <svg class="-ml-1 mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                            Sewa Sekarang
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection