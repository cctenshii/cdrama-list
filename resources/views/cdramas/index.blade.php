<x-app-layout>
    <h1>This is the Cdramas Index Page</h1>

    @foreach ($cdramas as $cdrama)
        <div>
            <h2>{{ $cdrama->name }}</h2>
            <p>{{ $cdrama->year }}</p>
            <p>{{ $cdrama->episodes }}</p>
            <p>{{ $cdrama->summary }}</p>
        </div>
    @endforeach
</x-app-layout>

