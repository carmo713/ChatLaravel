<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold gradient-text">
                {{ __('Conversa com ' . $friend->name) }}
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen hero-pattern relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
            <div class="bubble-container absolute inset-0">
                <div class="bubble w-[200px] h-[200px] top-[10%] left-[5%] bg-indigo-500/10 animate-float-1"></div>
                <div class="bubble w-[300px] h-[300px] top-[50%] right-[10%] bg-indigo-600/10 animate-float-2"></div>
                <div class="bubble w-[150px] h-[150px] bottom-[20%] left-[15%] bg-indigo-500/10 animate-float-3"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10">
            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="glass-effect shadow-2xl sm:rounded-3xl border border-indigo-100/50 overflow-hidden">
                        <div id="app" class="p-6">
                            <chat-component
                                :friend="{{ json_encode($friend) }}"
                                :current-user="{{ json_encode(auth()->user()) }}"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Root variables for consistent colors */
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #818cf8;
        }
        
        /* Gradient text effect */
        .gradient-text {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Hero pattern background */
        .hero-pattern {
            background-color: #ffffff;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%236366f1' fill-opacity='0.05'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        /* Glass effect for containers */
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* Layout adjustments */
        body, html {
            font-family: 'Figtree', sans-serif;
            overflow: hidden;
            scroll-behavior: smooth;
        }

        .min-h-screen {
            height: calc(100vh - 4rem); /* Account for header */
            display: flex;
            flex-direction: column;
        }

        .relative.z-10 {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .py-12 {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .mx-auto.max-w-7xl {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .glass-effect {
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        #app {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Bubble animations */
        .bubble {
            position: absolute;
            border-radius: 50%;
            opacity: 0.2;
            filter: blur(60px);
        }

        @keyframes float-1 {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-50px) translateX(20px); }
        }

        @keyframes float-2 {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(50px) translateX(-20px); }
        }

        @keyframes float-3 {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-30px) translateX(10px); }
        }

        .animate-float-1 { animation: float-1 10s ease-in-out infinite; }
        .animate-float-2 { animation: float-2 12s ease-in-out infinite; }
        .animate-float-3 { animation: float-3 8s ease-in-out infinite; }
    </style>
</x-app-layout>