<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-8">

        <h1 class="text-3xl font-bold mb-4">Add a New CDrama</h1>
        <a href="{{ route('cdramas.index') }}" class="text-blue-500 hover:underline mb-6 inline-block">
            &larr; Go Back
        </a>

        <form method="POST" action="{{ route('cdramas.store') }}" enctype="multipart/form-data"
              class="bg-white shadow-md rounded-lg p-6 space-y-4">

            @csrf

            {{-- Title --}}
            <div>
                <label class="block font-semibold mb-1" for="name">Title:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('name')
                <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Release Year --}}
            <div>
                <label class="block font-semibold mb-1" for="year">Release Year:</label>
                <input type="number" name="year" id="year" value="{{ old('year') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('year')
                <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Episodes --}}
            <div>
                <label class="block font-semibold mb-1" for="episodes">Episodes:</label>
                <input type="number" name="episodes" id="episodes" value="{{ old('episodes') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('episodes')
                <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Genre --}}
            <div>
                <label class="block font-semibold mb-1" for="genre_id">Genre:</label>
                <select name="genre_id" id="genre_id"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">-- Select a Genre --</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                @error('genre')
                <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Summary --}}
            <div>
                <label class="block font-semibold mb-1" for="summary">Summary:</label>
                <textarea name="summary" id="summary" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('summary') }}</textarea>
                @error('summary')
                <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>

            {{-- Image --}}
            <div>
                <label class="block font-semibold mb-1" for="image">CDrama Image:</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="w-full text-gray-600">
            </div>

            {{-- Submit --}}
            <div>
                <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
                    Add CDrama
                </button>
            </div>

        </form>
    </div>
</x-app-layout>
