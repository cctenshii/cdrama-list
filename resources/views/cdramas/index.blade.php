<x-app-layout>
    <h1>This is the Cdramas Index Page</h1>

    <a href="{{ route('cdramas.create') }}">Add Cdrama</a>

    <ul class="list-disc pl-10">
        @foreach ($cdramas as $cdrama)
            <li><a href="{{ route('cdramas.show', $cdrama) }}">{{ $cdrama->name }}</a></li>
        @endforeach
    </ul>
</x-app-layout>

