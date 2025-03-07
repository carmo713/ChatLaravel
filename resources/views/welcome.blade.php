<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Chat - Conecte, Comunique, Colabore</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            :root {
                --primary-color: #3498db;
                --secondary-color: #2980b9;
                --text-dark: #2c3e50;
                --text-muted: #34495e;
            }
            body, html {
                font-family: 'Inter', sans-serif;
                scroll-behavior: smooth;
                overflow-x: hidden;
            }
            .bg-pattern {
                background-color: #f0f4f8;
                background-image: 
                    linear-gradient(45deg, rgba(52, 152, 219, 0.05) 0%, transparent 50%),
                    linear-gradient(135deg, rgba(41, 128, 185, 0.05) 10%, transparent 80%);
                background-size: 100%, 100%;
            }
            .hero-gradient {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
                clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
            }
            .bubble {
                position: absolute;
                background: rgba(52, 152, 219, 0.1);
                border-radius: 50%;
                filter: blur(40px);
                animation: float 8s ease-in-out infinite;
                transition: all 0.5s ease;
            }
            .bubble:hover {
                transform: scale(1.1);
                filter: blur(30px);
            }
            @keyframes float {
                0%, 100% { transform: translateY(0) rotate(0deg); }
                50% { transform: translateY(-30px) rotate(180deg); }
            }
            .feature-card {
                transition: all 0.4s ease;
                transform-origin: center;
            }
            .feature-card:hover {
                transform: translateY(-15px) scale(1.05);
                box-shadow: 0 25px 50px -12px rgba(52, 152, 219, 0.25);
            }
            .nav-link {
                position: relative;
                color: white;
                text-decoration: none;
                transition: all 0.3s ease;
            }
            .nav-link::after {
                content: '';
                position: absolute;
                width: 0;
                height: 2px;
                background: white;
                bottom: -4px;
                left: 0;
                transition: width 0.3s ease;
            }
            .nav-link:hover::after {
                width: 100%;
            }
            .icon-hover {
                transition: transform 0.3s ease, opacity 0.3s ease;
            }
            .icon-hover:hover {
                transform: scale(1.1) rotate(5deg);
                opacity: 0.9;
            }
        </style>
    </head>
    <body class="bg-pattern min-h-screen relative">
        <!-- Decorative Bubbles -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
            <div class="bubble w-[250px] h-[250px] top-[10%] left-[5%]"></div>
            <div class="bubble w-[350px] h-[350px] top-[50%] right-[10%]"></div>
            <div class="bubble w-[200px] h-[200px] bottom-[20%] left-[15%]"></div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10">
            <!-- Header -->
            <header class="hero-gradient py-4 shadow-2xl">
                <div class="container mx-auto px-4 flex justify-between items-center">
                    <div class="text-white text-2xl font-bold flex items-center">
                        <svg class="w-8 h-8 mr-2 icon-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Laravel Chat
                    </div>
                    <nav class="flex items-center space-x-6">
                        @if (Route::has('login'))
                            @auth
                                <div class="dropdown relative">
                                    <button class="flex items-center text-white hover:text-gray-200 focus:outline-none">
                                        <span class="mr-2 nav-link">Painel</span>
                                        <svg class="w-4 h-4 icon-hover" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-2xl py-2 hidden">
                                        <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">Dashboard</a>
                                        <a href="{{ url('/profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">Perfil</a>
                                        <a href="{{ url('/logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">Sair</a>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="nav-link">
                                    Entrar
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg transition nav-link">
                                        Registrar
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </nav>
                </div>
            </header>

            <!-- Hero Section -->
            <div class="container mx-auto px-4 pt-32 pb-24 text-center">
                <h1 class="text-6xl font-bold text-[#2c3e50] mb-6 leading-tight">
                    Conecte. Comunique. <br>
                    <span class="text-[#3498db]">Colabore.</span>
                </h1>
                <p class="text-xl text-[#34495e] max-w-2xl mx-auto mb-10">
                    Capacite sua equipe com comunicação em tempo real perfeita. O Laravel Chat une as pessoas, tornando a colaboração fácil e intuitiva.
                </p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('register') }}" class="bg-[#3498db] hover:bg-[#2980b9] text-white px-8 py-3 rounded-full text-lg font-semibold transition shadow-lg transform hover:scale-105 hover:shadow-xl">
                        Começar
                    </a>
                    <a href="#features" class="bg-white border-2 border-[#3498db] text-[#3498db] hover:bg-[#3498db] hover:text-white px-8 py-3 rounded-full text-lg font-semibold transition transform hover:scale-105">
                        Saiba Mais
                    </a>
                </div>
            </div>

            <!-- Features Section -->
            <section id="features" class="container mx-auto px-4 py-24 bg-white/50 backdrop-blur-lg">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-[#2c3e50] mb-4">
                        Recursos Poderosos
                    </h2>
                    <p class="text-xl text-[#34495e] max-w-2xl mx-auto">
                        Descubra como o Laravel Chat transforma a comunicação da sua equipe
                    </p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="feature-card bg-white rounded-xl p-6 shadow-lg text-center">
                        <div class="mb-4 flex justify-center">
                            <svg class="w-16 h-16 text-[#3498db]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-[#2c3e50]">Mensagens em Tempo Real</h3>
                        <p class="text-[#34495e]">
                            Comunicação instantânea e sem atrasos, mantendo sua equipe sempre conectada.
                        </p>
                    </div>
                    <div class="feature-card bg-white rounded-xl p-6 shadow-lg text-center">
                        <div class="mb-4 flex justify-center">
                            <svg class="w-16 h-16 text-[#3498db]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-[#2c3e50]">Segurança Total</h3>
                        <p class="text-[#34495e]">
                            Criptografia de ponta a ponta e autenticação robusta para proteger suas conversas.
                        </p>
                    </div>
                    <div class="feature-card bg-white rounded-xl p-6 shadow-lg text-center">
                        <div class="mb-4 flex justify-center">
                            <svg class="w-16 h-16 text-[#3498db]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-[#2c3e50]">Interface Intuitiva</h3>
                        <p class="text-[#34495e]">
                            Design limpo e responsivo que funciona perfeitamente em qualquer dispositivo.
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <script>
            // Dropdown toggle for mobile responsiveness
            document.querySelector('.dropdown button').addEventListener('click', function() {
                const dropdownMenu = this.nextElementSibling;
                dropdownMenu.classList.toggle('hidden');
            });
        </script>
    </body>
</html>