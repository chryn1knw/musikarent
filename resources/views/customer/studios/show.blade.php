{{-- @extends('layouts.main')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Detail Studio</h4>
                        <a href="{{ route('customer.studios.index') }}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Gambar dan Status -->
                            <div class="col-md-5">
                                <img src="{{ $studio->photo_url ? asset('storage/' . $studio->photo_url) : asset('images/no-image.jpg') }}"
                                     alt="{{ $studio->name }}" class="img-fluid rounded shadow-sm mb-3">

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0">Status:</h5>
                                    @if($studio->status === 'available')
                                        <span class="badge bg-success text-white py-2 px-3">Tersedia</span>
                                    @elseif($studio->status === 'booked')
                                        <span class="badge bg-warning text-dark py-2 px-3">Dipesan</span>
                                    @else
                                        <span class="badge bg-danger text-white py-2 px-3">Maintenance</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Info Detail -->
                            <div class="col-md-7">
                                <h2 class="mb-3">{{ $studio->name }}</h2>
                                <h5 class="text-primary mb-3">
                                    Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}/jam
                                </h5>

                                <div class="mb-3">
                                    <div class="row mb-2">
                                        <div class="col-md-4 fw-bold">Kapasitas</div>
                                        <div class="col-md-8">{{ $studio->capacity }} orang</div>
                                    </div>
                                    <div class="row mb-2 align-items-center">
                                        <div class="col-md-4 fw-bold">Rating</div>
                                        <div class="col-md-8">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= round($studio->rating) ? 'text-warning' : 'text-secondary' }}"></i>
                                            @endfor
                                            <span class="ms-1 small text-muted">({{ $studio->rating }}/5)</span>
                                        </div>
                                    </div>
                                    @if($studio->features)
                                        <div class="mt-2 mb-3">
                                            @foreach(explode(',', $studio->features) as $feature)
                                                <span class="badge bg-light text-dark me-1 mb-1">{{ trim($feature) }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <h5>Deskripsi</h5>
                                <p class="text-muted">{{ $studio->description }}</p>

                                @if($studio->status === 'available')
                                    <div class="d-grid gap-2 mt-4">
                                        <button class="btn btn-primary btn-lg">
                                            <i class="bi bi-calendar-check me-2"></i> Pesan Sekarang
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
@endsection --}}
@extends('layouts.main')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                    <!-- Card Header -->
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-white">
                        <h3 class="text-lg font-medium text-gray-900">Detail Studio</h3>
                        <a href="{{ route('customer.studios.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                                <img src="{{ $studio->photo_url ? asset('storage/' . $studio->photo_url) : asset('images/no-image.jpg') }}"
                                     alt="{{ $studio->name }}" class="w-full h-auto rounded-lg shadow-md mb-4">

                                <div class="flex justify-between items-center mb-4">
                                    <h4 class="text-sm font-medium text-gray-700">Status:</h4>
                                    @if($studio->status === 'available')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                            Tersedia
                                        </span>
                                    @elseif($studio->status === 'booked')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                            Dipesan
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                            Maintenance
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Studio Details -->
                            <div class="md:w-3/5">
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $studio->name }}</h2>
                                <p class="text-xl text-indigo-600 font-semibold mb-4">
                                    Rp {{ number_format($studio->price_per_hour, 0, ',', '.') }}/jam
                                </p>

                                <div class="space-y-4 mb-4">
                                    <div class="flex items-start">
                                        <div class="w-1/3 text-sm font-medium text-gray-500">Kapasitas</div>
                                        <div class="w-2/3 text-sm text-gray-900 flex items-center">
                                            <svg class="h-4 w-4 mr-1 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                            </svg>
                                            {{ $studio->capacity }} orang
                                        </div>
                                    </div>

                                    <div class="flex items-start">
                                        <div class="w-1/3 text-sm font-medium text-gray-500">Rating</div>
                                        <div class="w-2/3 text-sm text-gray-900 flex items-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="h-4 w-4 {{ $i <= round($studio->rating) ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                </svg>
                                            @endfor
                                            <span class="ml-1 text-gray-500">({{ $studio->rating }}/5)</span>
                                        </div>
                                    </div>

                                    @if($studio->features)
                                        <div class="flex items-start">
                                            <div class="w-1/3 text-sm font-medium text-gray-500">Fasilitas</div>
                                            <div class="w-2/3">
                                                <div class="flex flex-wrap gap-1">
                                                    @foreach(explode(',', $studio->features) as $feature)
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                            {{ trim($feature) }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-6">
                                    <h4 class="text-sm font-medium text-gray-700 mb-2">Deskripsi</h4>
                                    <p class="text-sm text-gray-600">{{ $studio->description }}</p>
                                </div>

                                @if($studio->status === 'available')
                                    <div class="mt-8">
                                        <button type="button" class="w-full flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <svg class="-ml-1 mr-3 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Pesan Sekarang
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