<nav class="fixed w-full z-50 glass-effect border-b border-gray-200">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo and Brand -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center group">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="ml-3 text-xl font-bold gradient-text">ConnectFlow</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600 transition-colors {{ request()->routeIs('dashboard') ? 'text-indigo-600 font-medium' : '' }}">
                    Contatos
                </a>
            </div>

            <!-- User Actions -->
            <div class="flex items-center space-x-6">
                @auth
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}"
                           class="text-gray-700 hover:text-indigo-600 transition-colors"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                @else
                    <div class="flex items-center space-x-6">
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 transition-colors">
                            Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-full hover:bg-indigo-700 transition-colors shadow-lg hover:shadow-xl">
                                Register
                            </a>
                        @endif
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Compensate for fixed navbar -->
<div class="h-20"></div>

<style>
    .glass-effect {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
    
    .gradient-text {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    :root {
        --primary: #6366f1;
        --primary-dark: #4f46e5;
        --secondary: #818cf8;
    }
</style>