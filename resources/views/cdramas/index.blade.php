<x-app-layout>
    <h1>This is the Cdramas Index Page</h1>

    <ul>
        @foreach ($cdramas as $cdrama)
            <li><a href="{{ route('cdramas.show', $cdrama) }}">{{ $cdrama->name }}</a></li>
        @endforeach
    </ul>
</x-app-layout>

