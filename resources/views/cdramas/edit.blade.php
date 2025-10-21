<x-app-layout>
    <h1>Edit Cdrama</h1>
    <a href="{{ route('cdramas.index') }}">Go Back</a>

    <form method="POST" action="{{ route('cdramas.update', $cdrama->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Title:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $cdrama->name) }}">
        </div>

        <div>
            <label for="year">Release Year:</label>
            <input type="text" id="year" name="year" value="{{ old('year', $cdrama->year) }}">
        </div>

        <div>
            <label for="episodes">Episodes:</label>
            <input type="text" id="episodes" name="episodes" value="{{ old('episodes', $cdrama->episodes) }}">
        </div>

        <div>
            <label for="genre_id">Genre:</label>
            <select id="genre_id" name="genre_id">
                <option value="">-- Select a Genre --</option>
                @foreach($genres as $genre)
                    <option
                        value="{{ $genre->id }}" {{ old('genre_id', $cdrama->genre_id) == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="summary">Summary:</label>
            <textarea id="summary" name="summary">{{ old('summary', $cdrama->summary) }}</textarea>
        </div>

        <div>
            <label for="image">Cdrama Image:</label>
            @if($cdrama->image)
                <div>
                    <img src="{{ asset('storage/' . $cdrama->image) }}" alt="{{ $cdrama->name }}" width="150">
                </div>
            @endif
            <input type="file" id="image" name="image" accept="image/*">
        </div>

        <div>
            <input type="submit" value="Update Cdrama">
        </div>
    </form>
</x-app-layout>
