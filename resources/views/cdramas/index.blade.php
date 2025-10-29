<x-app-layout>
    <div class="pl-4 pr-4 flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Cdramas List</h1>
        @auth
            {{-- Show "Add" only for logged in users (Admin or User) --}}
            @if(Auth::user()->role->name === 'Admin' || Auth::user()->role->name === 'User')
                <a href="{{ route('cdramas.create') }}"
                   class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-400">
                    Add Cdrama
                </a>
            @endif
        @endauth

    </div>

    <div class="mb-6 flex flex-col md:flex-row md:items-center md:space-x-4 space-y-2 md:space-y-0">
        <form method="GET" action="{{ route('cdramas.index') }}"
              class="flex flex-col md:flex-row md:items-center md:space-x-2 space-y-2 md:space-y-0 w-full px-4">

            {{-- Search --}}
            <input type="text" name="search" placeholder="Search Cdramas..." value="{{ request('search') }}"
                   class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 flex-1">

            {{-- Genre Filter --}}
            <select name="genre_id"
                    class="border border-gray-300 rounded px-10 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">All Genres</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>

            {{-- Submit --}}
            <button type="submit"
                    class="bg-gray-600 text-white px-8 py-2 rounded hover:bg-gray-400 transition">
                Filter
            </button>
        </form>
    </div>

    {{-- Not Found Message --}}
    @if($cdramas->isEmpty())
        <div class="text-center text-gray-500 mt-6">
            No Cdramas found matching your search or filters.
        </div>
    @endif



    {{-- Grid container for 2-3 cards per row --}}
    <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($cdramas as $cdrama)
            <div class="bg-white rounded-lg shadow p-4 flex flex-col md:flex-row items-start md:items-center h-full">

                {{-- Image on the left --}}
                <div class="w-full md:w-1/3 flex-shrink-0 mb-4 md:mb-0">
                    @if ($cdrama->image)
                        <img
                            src="{{ asset('storage/' . $cdrama->image) }}"
                            alt="{{ $cdrama->name }}"
                            class="w-full aspect-[1.41] object-cover rounded"
                        >
                    @else
                        <div class="w-full aspect-[1.41] bg-gray-200 flex items-center justify-center rounded">
                            <span class="text-gray-500">No image</span>
                        </div>
                    @endif
                </div>

                {{-- Text and buttons on the right --}}
                <div class="flex-1 md:pl-6 flex flex-col justify-between h-full">
                    <div>
                        <h2 class="text-xl font-semibold mb-2">{{ $cdrama->name }}</h2>
                        <p class="text-gray-600 mb-1">Release: {{ $cdrama->year }}</p>
                        <p class="text-gray-600 mb-1">Episodes: {{ $cdrama->episodes }}</p>
                        <p class="text-gray-600 mb-2">Genre: {{ $cdrama->genre->name ?? 'Unknown' }}</p>

                        @if($cdrama->creator)
                            <p class="text-gray-500 text-sm">Added by: {{ $cdrama->creator->name }}</p>
                        @endif

                    </div>

                    <div class="flex space-x-2 mt-4">
                        {{-- View button: visible to everyone --}}
                        <a href="{{ route('cdramas.show', $cdrama) }}"
                           class="bg-blue-400 text-white px-3 py-1 rounded hover:bg-blue-300">
                            View
                        </a>
                    </div>

                </div>

            </div>
        @endforeach
    </div>
</x-app-layout>
