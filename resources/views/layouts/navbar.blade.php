<nav class="my-6 pl-4 pr-4 flex gap-4 items-center justify-between">
    <div class="flex gap-4">
        <x-nav-link href="{{ route('about') }}" :active="Route::is('about')">About</x-nav-link>
        <x-nav-link href="{{ route('cdramas.index') }}" :active="Route::is('cdramas.index')">Cdramas</x-nav-link>
        <x-nav-link href="{{ route('contact') }}" :active="Route::is('contact')">Contact</x-nav-link>
    </div>

    {{-- Right-side auth section --}}
    <div class="flex gap-4 items-center">
        @auth
            {{-- Optional: show user's name --}}
            <span class="text-gray-700 dark:text-gray-300">
                Hello, {{ Auth::user()->name }}!
            </span>

            {{-- Optional: link to profile --}}
            <x-nav-link href="{{ route('profile.edit') }}" :active="Route::is('profile.edit')">Profile</x-nav-link>

            {{-- Admin button --}}
            @if(Auth::user()->role->name === 'Admin')
                <x-nav-link href="{{ route('admin.cdramas.index') }}" :active="Route::is('admin.cdramas.index')">
                    Admin Overview
                </x-nav-link>
            @endif

            {{-- Logout button --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="text-gray-700 dark:text-gray-300 hover:text-red-500 transition">
                    Logout
                </button>
            </form>
        @endauth

        {{-- If user is NOT logged in --}}
        @guest
            <x-nav-link href="{{ route('login') }}" :active="Route::is('login')">Login</x-nav-link>
            <x-nav-link href="{{ route('register') }}" :active="Route::is('register')">Register</x-nav-link>
        @endguest
    </div>
</nav>
