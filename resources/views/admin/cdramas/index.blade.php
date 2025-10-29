<x-app-layout>
    <h1 class="text-3xl font-bold mb-6 px-4">Admin Overview - Cdramas</h1>

    @if(session('status'))
        <div class="mb-4 p-2 bg-green-200 rounded">{{ session('status') }}</div>
    @endif

    <table class="min-w-full bg-white shadow rounded">
        <thead class="bg-gray-200">
        <tr>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Year</th>
            <th class="px-4 py-2">Episodes</th>
            <th class="px-4 py-2">Genre</th>
            <th class="px-4 py-2">Added By</th> {{-- 👈 Added this --}}
            <th class="px-4 py-2">Private</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cdramas as $cdrama)
            <tr class="border-b">
                <td class="px-4 py-2">{{ $cdrama->name }}</td>
                <td class="px-4 py-2">{{ $cdrama->year }}</td>
                <td class="px-4 py-2">{{ $cdrama->episodes }}</td>
                <td class="px-4 py-2">{{ $cdrama->genre->name ?? 'Unknown' }}</td>

                {{-- Added By Column --}}
                <td class="px-4 py-2">
                    {{ $cdrama->creator->name ?? 'Unknown' }}
                </td>

                {{-- Private/Public Toggle --}}
                <td class="px-4 py-2">
                    <form method="POST" action="{{ route('admin.cdramas.toggle', $cdrama) }}">
                        @csrf
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="public"
                                   onchange="this.form.submit()"
                                   class="sr-only peer"
                                {{ $cdrama->public ? '' : 'checked' }}>
                            <div
                                class="w-11 h-6 bg-gray-300 rounded-full peer peer-checked:bg-red-500 transition-all"></div>
                            <div
                                class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow-md transform transition peer-checked:translate-x-5"></div>
                            <span class="ml-2">{{ $cdrama->public ? 'Public' : 'Private' }}</span>
                        </label>
                    </form>
                </td>

                {{-- Edit & Delete Buttons --}}
                <td class="px-4 py-2 flex space-x-2">
                    <a href="{{ route('cdramas.edit', $cdrama->id) }}"
                       class="bg-gray-500 text-white px-3 py-1 rounded hover:bg-gray-400">
                        Edit
                    </a>
                    <form action="{{ route('cdramas.destroy', $cdrama->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this Cdrama?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-400 text-white px-3 py-1 rounded hover:bg-red-300">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
