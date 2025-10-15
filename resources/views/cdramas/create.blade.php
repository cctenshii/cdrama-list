<x-app-layout>
    <h1>Add a new Cdrama</h1>
    <a href="{{ route('cdramas.index') }}">Go Back</a>
    <form method="POST" action="{{ route('cdramas.store') }}">
        @csrf
        <div>
            <label for="name">Title:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="year">Release Year:</label>
            <input type="text" id="year" name="year" value="{{ old('year') }}">
        </div>
        <div>
            <label for="episodes">Episodes:</label>
            <input type="text" id="episodes" name="episodes" value="{{ old('episodes') }}">
        </div>
        <div>
            <label for="genre_id">Genre:</label>
            <select id="genre_id" name="genre_id">
                <option value="">-- Select a Genre --</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="summary">Summary:</label>
            <textarea id="summary" name="summary"></textarea>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</x-app-layout>
