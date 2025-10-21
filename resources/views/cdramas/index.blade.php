<x-app-layout>
    <h1>This is the Cdramas Index Page</h1>

    <a href="{{ route('cdramas.create') }}">Add Cdrama</a>

    <ul class="list-disc pl-10">
        @foreach ($cdramas as $cdrama)
            <li><a href="{{ route('cdramas.show', $cdrama) }}">{{ $cdrama->name }}</a></li>
            <li><a href="{{ route('cdramas.edit', $cdrama->id) }}">Edit</a></li>

            @if ($cdrama->image)
                <img
                    src="{{ asset('storage/' . $cdrama->image) }}"
                    alt="{{ $cdrama->name }}"
                    width="150"
                    style="border-radius: 8px;"
                >
            @else
                <p>No image available</p>
            @endif

            <form action="{{ route('cdramas.destroy', $cdrama->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    onclick="return confirm('Are you sure you want to delete this Cdrama?')"
                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                >
                    Delete
                </button>
            </form>
        @endforeach
    </ul>
</x-app-layout>

