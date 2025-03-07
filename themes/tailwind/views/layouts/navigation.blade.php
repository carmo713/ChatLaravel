<nav class="bg-white backdrop-blur-lg border-b border-gray-100 shadow-md fixed top-0 left-0 right-0 z-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo and Brand -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="flex items-center group">
                    <svg class="w-9 h-9 text-[#3498db] group-hover:text-[#2980b9] transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="ml-2 text-xl font-semibold text-[#2c3e50] group-hover:text-[#3498db] transition-colors duration-300">
                        LaravelChat
                    </span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex items-center space-x-6">
                <a href="{{ route('dashboard') }}" class="relative group">
                    <span class="text-[#34495e] font-medium group-hover:text-[#3498db] transition-colors duration-300 
                        {{ request()->routeIs('dashboard') ? 'text-[#3498db]' : '' }}">
                        Contatos
                    </span>
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#3498db] 
                        group-hover:w-full transition-all duration-300 
                        {{ request()->routeIs('dashboard') ? 'w-full' : '' }}"></span>
                </a>
            </div>

            <!-- User Actions -->
            <div class="hidden sm:flex items-center space-x-4">
                @auth
                    <div class="flex items-center space-x-4">
                        <div class="text-[#34495e] font-medium">
                            {{ Auth::user()->name }}
                        </div>
                        <a href="{{ route('logout') }}"
                           class="px-4 py-2 text-[#34495e] hover:bg-gray-100 rounded-lg transition duration-300 ease-in-out"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-[#34495e] hover:text-[#3498db] transition duration-300">
                            Entrar
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="bg-[#3498db] hover:bg-[#2980b9] text-white px-4 py-2 rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-0.5 shadow-md hover:shadow-lg">
                                Registrar
                            </a>
                        @endif
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Compensate for fixed navbar -->
<div class="h-16"></div>