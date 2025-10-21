<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-8">

        <h1 class="text-3xl font-bold mb-4">Edit CDrama</h1>
        <a href="{{ route('cdramas.index') }}" class="text-blue-500 hover:underline mb-6 inline-block">
            &larr; Go Back
        </a>

        <form method="POST" action="{{ route('cdramas.update', $cdrama->id) }}" enctype="multipart/form-data"
              class="bg-white shadow-md rounded-lg p-6 space-y-4">

            @csrf
            @method('PUT')

            {{-- Title --}}
            <div>
                <label class="block font-semibold mb-1" for="name">Title:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $cdrama->name) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- Release Year --}}
            <div>
                <label class="block font-semibold mb-1" for="year">Release Year:</label>
                <input type="text" name="year" id="year" value="{{ old('year', $cdrama->year) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- Episodes --}}
            <div>
                <label class="block font-semibold mb-1" for="episodes">Episodes:</label>
                <input type="text" name="episodes" id="episodes" value="{{ old('episodes', $cdrama->episodes) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- Genre --}}
            <div>
                <label class="block font-semibold mb-1" for="genre_id">Genre:</label>
                <select name="genre_id" id="genre_id"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">-- Select a Genre --</option>
                    @foreach($genres as $genre)
                        <option
                            value="{{ $genre->id }}" {{ old('genre_id', $cdrama->genre_id) == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Summary --}}
            <div>
                <label class="block font-semibold mb-1" for="summary">Summary:</label>
                <textarea name="summary" id="summary" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('summary', $cdrama->summary) }}</textarea>
            </div>

            {{-- Image --}}
            <div>
                <label class="block font-semibold mb-1" for="image">CDrama Image:</label>

                @if($cdrama->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $cdrama->image) }}"
                             alt="{{ $cdrama->name }}"
                             class="w-40 h-auto rounded shadow">
                    </div>
                @endif

                <input type="file" name="image" id="image" accept="image/*" class="w-full text-gray-600">
            </div>

            {{-- Submit --}}
            <div>
                <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
                    Update CDrama
                </button>
            </div>

        </form>
    </div>
</x-app-layout>
