<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-8">

        {{-- Back link --}}
        <a href="{{ route('cdramas.index') }}"
           class="text-blue-500 hover:underline mb-6 inline-block">
            &larr; Go Back
        </a>

        {{-- Main content card --}}
        <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row gap-6 p-6">

            {{-- Image --}}
            <div class="flex-shrink-0">
                @if ($cdrama->image && file_exists(public_path('storage/' . $cdrama->image)))
                    <img src="{{ asset('storage/' . $cdrama->image) }}"
                         alt="{{ $cdrama->name }}"
                         class="w-64 h-auto md:h-96 object-cover rounded shadow">
                @else
                    <img src="{{ asset('images/placeholder.jpg') }}"
                         alt="No image available"
                         class="w-64 h-auto md:h-96 object-cover rounded opacity-70 shadow">
                @endif
            </div>

            {{-- Text content --}}
            <div class="flex-1 flex flex-col justify-between">
                <h1 class="text-3xl font-bold mb-4">{{ $cdrama->name }}</h1>

                <div class="space-y-2 mb-4">
                    <p class="text-lg"><span class="font-semibold">Release:</span> {{ $cdrama->year }}</p>
                    <p class="text-lg"><span class="font-semibold">Episodes:</span> {{ $cdrama->episodes }}</p>
                    <p class="text-lg"><span class="font-semibold">Genre:</span> {{ $cdrama->genre->name ?? 'Unknown' }}
                    </p>
                </div>

                <p class="text-gray-700 leading-relaxed">{{ $cdrama->summary }}</p>
            </div>

        </div>
    </div>
</x-app-layout>
