<x-app-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Cdramas List</h1>
        <a href="{{ route('cdramas.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Add Cdrama
        </a>
    </div>

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
                    </div>

                    <div class="flex space-x-2 mt-4">
                        <a href="{{ route('cdramas.show', $cdrama) }}"
                           class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                            View
                        </a>
                        <a href="{{ route('cdramas.edit', $cdrama->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            Edit
                        </a>
                        <form action="{{ route('cdramas.destroy', $cdrama->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this Cdrama?')"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</x-app-layout>
