<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Petson Moida</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100 font-sans">

    <!-- Navbar -->
    <nav class="bg-green-700 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-2xl font-bold">
                PETSON MOIDA
            </h1>

        </div>
    </nav>


    <!-- Hero -->
    <section class="min-h-screen flex items-center justify-center">

        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">

            <div>
                <h2 class="text-5xl font-bold text-slate-800 leading-tight">
                    Sistema de Gestão de Resíduos
                </h2>

                <p class="mt-6 text-lg text-gray-600">
                    Plataforma inteligente para administração de funcionários,
                    serviços, recolha e monitoramento ambiental.
                </p>

                <div class="mt-8">
                    <a href="{{ route('login') }}"
                       class="bg-green-700 text-white px-8 py-4 rounded-xl text-lg font-semibold hover:bg-green-800 transition">
                        Entrar no Sistema
                    </a>
                </div>
            </div>


            <div class="bg-white p-10 rounded-3xl shadow-2xl">

                <h3 class="text-2xl font-bold text-green-700 mb-6">
                    Recursos do Sistema
                </h3>

                <ul class="space-y-4 text-gray-700 text-lg">
                    <li>✅ Gestão de Funcionários</li>
                    <li>✅ Gestão de Serviços</li>
                    <li>✅ Painel Administrativo</li>
                    <li>✅ Relatórios</li>
                    <li>✅ Segurança e Autenticação</li>
                </ul>

            </div>

        </div>

    </section>


    <footer class="bg-slate-900 text-white text-center py-5">
        © {{ date('Y') }} Petson Moida - Todos os direitos reservados
    </footer>

</body>
</html>