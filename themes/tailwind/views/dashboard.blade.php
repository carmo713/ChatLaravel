<x-app-layout>
    <div class="bg-gradient-to-br from-[#e6f2ff] to-[#f0f4f8] min-h-screen relative overflow-hidden">
        <!-- Animated Background Bubbles -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
            <div class="bubble-container absolute inset-0">
                <div class="bubble w-[250px] h-[250px] top-[10%] left-[5%] bg-[#3498db]/10 animate-float-1"></div>
                <div class="bubble w-[350px] h-[350px] top-[50%] right-[10%] bg-[#2980b9]/10 animate-float-2"></div>
                <div class="bubble w-[200px] h-[200px] bottom-[20%] left-[15%] bg-[#3498db]/10 animate-float-3"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 py-16">
            <div class="mx-auto max-w-4xl px-4">
                <div class="bg-white/90 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden border border-gray-100/50 transform transition-all duration-300 hover:shadow-3xl">
                    <div class="p-8 md:p-12">
                        <!-- Heading with Gradient and Icon -->
                        <div class="flex items-center mb-8 space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#3498db]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.768-.231-1.48-.634-2.61A9.81 9.81 0 0019 7a4 4 0 10-8 0 9.81 9.81 0 00.634 2.39M12 7a4 4 0 00-8 0 9.81 9.81 0 00.634 4.39M12 7V3m0 4v3m0 0H7m5 0h5" />
                            </svg>
                            <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#3498db] to-[#2980b9]">
                                Contatos
                            </h2>
                        </div>

                        <!-- Contacts Grid -->
                        <div class="grid gap-5 max-h-[60vh] overflow-y-auto scrollbar-thin scrollbar-thumb-[#3498db] scrollbar-track-[#f0f4f8]">
                            @foreach ($users as $user)
                                <a href="{{ route('chat', $user) }}"
                                   class="group p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 ease-in-out transform hover:scale-[1.03] flex items-center border border-[#3498db]/10 hover:border-[#3498db]/30">
                                    <div class="flex-grow">
                                        <div class="flex items-center space-x-4">
                                            <div class="w-12 h-12 bg-[#3498db]/10 rounded-full flex items-center justify-center">
                                                <span class="text-[#3498db] font-bold text-lg">
                                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="text-lg font-semibold text-[#2c3e50] group-hover:text-[#3498db] transition-colors duration-300">
                                                    {{ $user->name }}
                                                </h3>
                                                <p class="text-sm text-[#7f8c8d] truncate max-w-[250px]">
                                                    {{ $user->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-10 h-10 rounded-full bg-[#3498db]/10 flex items-center justify-center transition-all duration-300 group-hover:bg-[#3498db]/20">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#3498db] opacity-50 group-hover:opacity-100 group-hover:translate-x-0.5 transition-all" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
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
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background-color: #f0f4f8;
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
        .scrollbar-thin {
            scrollbar-width: thin;
            scrollbar-color: #3498db #f0f4f8;
        }

        .scrollbar-thin::-webkit-scrollbar {
            width: 8px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background-color: #3498db;
            border-radius: 4px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background-color: #f0f4f8;
        }

        /* Hide horizontal scrollbar */
        .scrollbar-thin::-webkit-scrollbar-horizontal {
            display: none;
        }
    </style>
</x-app-layout>