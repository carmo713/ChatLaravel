<x-guest-layout>
    <div class="min-h-screen hero-pattern flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <svg class="w-16 h-16 mx-auto text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                <h2 class="mt-6 text-3xl font-bold gradient-text">Welcome Back</h2>
                <p class="mt-2 text-gray-600">Sign in to continue to ConnectFlow</p>
            </div>

            <div class="bg-white/70 backdrop-blur-lg shadow-2xl rounded-2xl overflow-hidden">
                <div class="p-8">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                {{ __('Email') }}
                            </label>
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    class="pl-10 block w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    placeholder="you@example.com"
                                />
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mt-6 space-y-2">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                {{ __('Password') }}
                            </label>
                            <div class="relative rounded-lg shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    class="pl-10 block w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    placeholder="••••••••"
                                />
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="mt-6 flex items-center justify-between">
                            <div class="flex items-center">
                                <input
                                    id="remember_me"
                                    name="remember"
                                    type="checkbox"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                />
                                <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                    {{ __('Remember me') }}
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="mt-6">
                            <button
                                type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-150 ease-in-out transform hover:scale-[1.02] active:scale-[0.98]"
                            >
                                {{ __('Sign in') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sign up link -->
            @if (Route::has('register'))
                <p class="mt-8 text-center text-sm text-gray-600">
                    {{ __('Not registered?') }}
                    <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        {{ __('Create an account') }}
                    </a>
                </p>
            @endif

            <!-- Social Proof -->
            <div class="mt-10 text-center">
                <p class="text-xs text-gray-500">
                    Trusted by thousands of teams worldwide
                </p>
                <div class="mt-3 flex justify-center space-x-6">
                    <div class="text-gray-400">•</div>
                    <div class="text-gray-400">256-bit encryption</div>
                    <div class="text-gray-400">•</div>
                    <div class="text-gray-400">SOC 2 Certified</div>
                    <div class="text-gray-400">•</div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .gradient-text {
            background: linear-gradient(135deg, #6366f1 0%, #818cf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-pattern {
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%236366f1' fill-opacity='0.05'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</x-guest-layout>