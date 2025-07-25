<x-admin>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">Admin Dashboard</h2>
    </x-slot>

    <div class="py-6">
        <div class="grid grid-cols-1 mx-6 md:grid-cols-3 gap-7">
            @foreach ([
                ['title' => 'Categories', 'count' => \App\Models\InstrumentCategory::count(), 'color' => 'indigo'],
                ['title' => 'Instruments', 'count' => \App\Models\Instrument::count(), 'color' => 'blue'],
                ['title' => 'Studios', 'count' => \App\Models\Studio::count(), 'color' => 'green'],
            ] as $card)
                <div class="bg-white rounded-lg shadow p-6 border-t-4 border-{{ $card['color'] }}-500">
                    <p class="text-sm font-medium text-gray-500">{{ $card['title'] }}</p>
                    <p class="text-2xl font-semibold text-gray-800">{{ $card['count'] }}</p>
                    <div class="mt-4">
                        <a href="{{ route('admin.' . strtolower($card['title']) . '.index') }}"class="inline-block text-{{ $card['color'] }}-600 hover:underline">Manage {{ $card['title'] }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-admin>
