<!DOCTYPE html>
<html>
<head>
    <title>Kedai Makan System</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-100">

<div class="flex">

    <!-- Sidebar -->

    <aside class="w-64 min-h-screen bg-slate-900 text-white">

        <div class="p-6">

            <h1 class="text-2xl font-bold">
                🍽️ Kedai Makan
            </h1>

        </div>

        <nav class="px-4">

            <a href="/dashboard"
               class="block p-3 rounded-lg hover:bg-slate-800 mb-2">
                Dashboard
            </a>

            <a href="/menu"
               class="block p-3 rounded-lg hover:bg-slate-800 mb-2">
                Menu
            </a>

            <a href="/sales"
               class="block p-3 rounded-lg hover:bg-slate-800 mb-2">
                Sales
            </a>

        </nav>

    </aside>

    <!-- Content -->

    <main class="flex-1">

        <header class="bg-white shadow-sm">

            <div class="px-8 py-5 flex justify-between">

                <h2 class="text-2xl font-semibold">
                    Sistem Pengurusan Kedai Makan
                </h2>

                <div>

                    <span class="text-slate-600">
                        Admin
                    </span>

                </div>

            </div>

        </header>

        <div class="p-8">

            @yield('content')

        </div>

    </main>

</div>

</body>
</html>