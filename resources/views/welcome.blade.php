<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ConnectFlow - Plataforma de Chat em Tempo Real</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #818cf8;
        }
        
        body {
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

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
    </style>
</head>
<body class="hero-pattern">
    <!-- Navegação -->
    <nav class="fixed w-full z-50 glass-effect border-b border-gray-200">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="ml-3 text-xl font-bold gradient-text">ConnectFlow</span>
                </div>
                
                <div class="flex items-center space-x-6">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-indigo-600 transition-colors">Painel</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 transition-colors">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-full hover:bg-indigo-700 transition-colors shadow-lg hover:shadow-xl">
                                    Registrar
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Seção Hero -->
    <section class="pt-32 pb-20">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 lg:pr-12">
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                        Conecte e converse em
                        <span class="gradient-text">Tempo Real</span>
                    </h1>
                    <p class="text-xl text-gray-600 mb-8">
                        Experimente uma comunicação perfeita com nossa plataforma de chat moderna. Conecte-se com sua equipe, compartilhe ideias e colabore de forma eficaz.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-indigo-700 transition-colors shadow-lg hover:shadow-xl">
                            Comece Grátis
                        </a>
                        <a href="#features" class="border-2 border-indigo-600 text-indigo-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-indigo-50 transition-colors">
                            Saiba Mais
                        </a>
                    </div>
                </div>
                <div class="lg:w-1/2 mt-12 lg:mt-0">
                    <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&q=80&w=600" alt="Interface de Chat" class="rounded-2xl shadow-2xl animate-float" />
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Recursos -->
    <section id="features" class="py-20 bg-gradient-to-b from-white to-indigo-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-bold mb-4">Por que escolher o ConnectFlow?</h2>
                <p class="text-xl text-gray-600">Descubra os recursos que fazem nossa plataforma se destacar</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="feature-card bg-white p-8 rounded-2xl shadow-lg">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Mensagens em Tempo Real</h3>
                    <p class="text-gray-600">Entrega instantânea de mensagens com notificações em tempo real para manter todos conectados.</p>
                </div>

                <div class="feature-card bg-white p-8 rounded-2xl shadow-lg">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Comunicação Segura</h3>
                    <p class="text-gray-600">Criptografia de ponta a ponta garante que suas conversas permaneçam privadas e seguras.</p>
                </div>

                <div class="feature-card bg-white p-8 rounded-2xl shadow-lg">
                    <div class="w-14 h-14 bg-indigo-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Colaboração em Equipe</h3>
                    <p class="text-gray-600">Crie canais, compartilhe arquivos e colabore perfeitamente com sua equipe.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção CTA -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="bg-indigo-600 rounded-3xl p-12 text-center text-white">
                <h2 class="text-4xl font-bold mb-6">Pronto para começar?</h2>
                <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">
                    Junte-se a milhares de equipes que já usam o ConnectFlow para melhorar sua comunicação.
                </p>
                <a href="{{ route('register') }}" class="bg-white text-indigo-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-indigo-50 transition-colors inline-block">
                    Crie Sua Conta
                </a>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <span class="ml-3 text-xl font-bold">ConnectFlow</span>
                    </div>
                    <p class="text-gray-400">Plataforma de comunicação em tempo real para equipes modernas.</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Produto</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Recursos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Segurança</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Empresa</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Empresa</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Sobre</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Carreiras</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Legal</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacidade</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Termos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Segurança</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} ConnectFlow. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>