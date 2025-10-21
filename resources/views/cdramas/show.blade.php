<x-app-layout>
    <a href="{{ route('cdramas.index') }}" class="text-blue-500 hover:underline">Go Back</a>

    <div class="mt-6">
        <h1 class="text-3xl font-bold mb-4">{{ $cdrama->name }}</h1>

        @if ($cdrama->image && file_exists(public_path('storage/' . $cdrama->image)))
            <img src="{{ asset('storage/' . $cdrama->image) }}" alt="{{ $cdrama->name }}"
                 class="w-64 h-auto rounded shadow mb-4">
        @elseif (file_exists(public_path("images/{$cdrama->id}.jpg")))
            <img src="{{ asset("images/{$cdrama->id}.jpg") }}" alt="{{ $cdrama->name }}"
                 class="w-64 h-auto rounded shadow mb-4">
        @else
            <img src="{{ asset('images/placeholder.jpg') }}" alt="No image available"
                 class="w-64 h-auto rounded opacity-70 mb-4">
        @endif

        <h2 class="text-xl">Release: {{ $cdrama->year }}</h2>
        <h2 class="text-xl">Episodes: {{ $cdrama->episodes }}</h2>
        <h2 class="text-xl">Genre: {{ $cdrama->genre->name ?? 'Unknown' }}</h2>
        <p class="mt-2 text-gray-700">Summary: {{ $cdrama->summary }}</p>
    </div>
</x-app-layout>
