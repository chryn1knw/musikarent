@props(['header'])

<x-layouts.admin>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>{{ $header }}</div>
            <div class="space-x-2">
                <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-500 hover:text-gray-800">← Back to Dashboard</a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </div>
</x-layouts.admin>
