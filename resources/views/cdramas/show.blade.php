<x-app-layout>
    <a href="{{ route('cdramas.index') }}">Go Back</a>
    <h1><strong>{{ $cdrama->name }}</strong></h1>
    <h1>Release: {{ $cdrama->year }}</h1>
    <h1>Episodes: {{ $cdrama->episodes }}</h1>
    <h1>Genre: {{ $cdrama->genre->name ?? 'Unknown' }}</h1>
    <p>Summary: {{ $cdrama->summary }}</p>
</x-app-layout>
