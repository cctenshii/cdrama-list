<nav class="my-6 flex gap-4">
    <x-nav-link href="{{route('home')}}" :active="Route::is('home')">Home</x-nav-link>
    <x-nav-link href="{{route('about')}}" :active="Route::is('about')">About</x-nav-link>
    <x-nav-link href="{{route('contact')}}" :active="Route::is('contact')">Contact</x-nav-link>
</nav>
