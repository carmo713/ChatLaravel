<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#3498db] to-[#2980b9]">
                {{ __('Conversa com ' . $friend->name) }}
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-[#f0f4f8] to-[#e6f2ff] relative overflow-hidden">
        <!-- Animated Background Bubbles -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
            <div class="bubble-container absolute inset-0">
                <div class="bubble w-[200px] h-[200px] top-[10%] left-[5%] bg-[#3498db]/10 animate-float-1"></div>
                <div class="bubble w-[300px] h-[300px] top-[50%] right-[10%] bg-[#2980b9]/10 animate-float-2"></div>
                <div class="bubble w-[150px] h-[150px] bottom-[20%] left-[15%] bg-[#3498db]/10 animate-float-3"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10">
            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white/80 backdrop-blur-md shadow-2xl sm:rounded-2xl">
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
        /* Impede o scroll na tela principal */
        body, html {
            font-family: 'Poppins', sans-serif;
            overflow: hidden; /* Desabilita o scroll na tela principal */
            background-color: #f0f4f8;
        }

        /* Ajusta o layout para ocupar a altura da tela */
        .min-h-screen {
            height: 100vh; /* Garante que o layout ocupe toda a altura da tela */
            display: flex;
            flex-direction: column;
        }

        .relative.z-10 {
            flex: 1; /* Faz com que o conteúdo principal ocupe o espaço restante */
            display: flex;
            flex-direction: column;
        }

        .py-12 {
            flex: 1; /* Faz com que o conteúdo dentro do container ocupe o espaço restante */
            display: flex;
            flex-direction: column;
        }

        .mx-auto.max-w-7xl {
            flex: 1; /* Faz com que o conteúdo dentro do container ocupe o espaço restante */
            display: flex;
            flex-direction: column;
        }

        .overflow-hidden.bg-white\/80 {
            flex: 1; /* Faz com que o conteúdo dentro do container ocupe o espaço restante */
            display: flex;
            flex-direction: column;
        }

        #app {
            flex: 1; /* Faz com que o conteúdo dentro do container ocupe o espaço restante */
            display: flex;
            flex-direction: column;
        }

        /* Estilos para as bolhas animadas */
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