<x-app-layout>
    <h1>{{ $cdrama->name }}</h1>
    <h1>{{ $cdrama->year }}</h1>
    <h1>Episodes: {{ $cdrama->episodes }}</h1>
    <h1>Genre: {{$cdrama->genre_id}}</h1>
    <p>Summary: {{ $cdrama->summary }}</p>
</x-app-layout>
