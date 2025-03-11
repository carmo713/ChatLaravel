<x-app-layout>
    <div class="hero-pattern min-h-screen relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
            <div class="bubble-container absolute inset-0">
                <div class="bubble w-[250px] h-[250px] top-[10%] left-[5%] bg-indigo-500/10 animate-float-1"></div>
                <div class="bubble w-[350px] h-[350px] top-[50%] right-[10%] bg-indigo-600/10 animate-float-2"></div>
                <div class="bubble w-[200px] h-[200px] bottom-[20%] left-[15%] bg-indigo-500/10 animate-float-3"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 py-16">
            <div class="mx-auto max-w-4xl px-6">
                <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden border border-indigo-100/50 transform transition-all duration-300 hover:shadow-3xl">
                    <div class="p-8 md:p-12">
                        <!-- Heading with Gradient and Icon -->
                        <div class="flex items-center mb-8 space-x-4">
                            <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center">
                                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.768-.231-1.48-.634-2.61M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold gradient-text">
                                Contatos
                            </h2>
                        </div>

                        <!-- Contacts Grid -->
                        <div class="grid gap-5 max-h-[60vh] overflow-y-auto custom-scrollbar">
                            @foreach ($users as $user)
                                <a href="{{ route('chat', $user) }}"
                                   class="feature-card p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 flex items-center border border-indigo-100">
                                    <div class="flex-grow">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                                                <span class="text-indigo-600 font-bold text-lg">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition-colors duration-300">
                                                    {{ $user->name }}
                                                </h3>
                                                <p class="text-sm text-gray-600 truncate max-w-[250px]">
                                                    {{ $user->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center transition-all duration-300 group-hover:bg-indigo-200">
                                        <svg class="w-5 h-5 text-indigo-600 opacity-70 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body, html {
            font-family: 'Figtree', sans-serif;
            scroll-behavior: smooth;
        }

        .gradient-text {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-pattern {
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%236366f1' fill-opacity='0.05'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* Bubble Animations */
        @keyframes float-1 {
            0%, 100% { transform: translateY(0) translateX(0) rotate(0deg); }
            50% { transform: translateY(-50px) translateX(20px) rotate(10deg); }
        }

        @keyframes float-2 {
            0%, 100% { transform: translateY(0) translateX(0) rotate(0deg); }
            50% { transform: translateY(50px) translateX(-20px) rotate(-10deg); }
        }

        @keyframes float-3 {
            0%, 100% { transform: translateY(0) translateX(0) rotate(0deg); }
            50% { transform: translateY(-30px) translateX(10px) rotate(5deg); }
        }

        .animate-float-1 { animation: float-1 10s ease-in-out infinite; }
        .animate-float-2 { animation: float-2 12s ease-in-out infinite; }
        .animate-float-3 { animation: float-3 8s ease-in-out infinite; }

        /* Custom Scrollbar */
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #6366f1 #f0f4f8;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #6366f1;
            border-radius: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background-color: #f0f4f8;
        }

        /* Hide horizontal scrollbar */
        .custom-scrollbar::-webkit-scrollbar-horizontal {
            display: none;
        }

        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #818cf8;
        }
    </style>
</x-app-layout>