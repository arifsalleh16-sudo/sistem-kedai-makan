<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Sistem Pengurusan Kedai Makan</title>

    @vite(['resources/css/app.css'])

</head>

<body class="bg-slate-100">

    <!-- Navbar -->

    <nav class="bg-white shadow-sm">

        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-2xl font-bold text-slate-800">

                🍽️ Kedai Makan POS

            </h1>

            <div class="space-x-3">

                <a href="{{ route('login') }}"
                   class="px-5 py-2 bg-slate-800 text-white rounded-xl">

                    Login

                </a>

                <a href="{{ route('register') }}"
                   class="px-5 py-2 bg-blue-600 text-white rounded-xl">

                    Register

                </a>

            </div>

        </div>

    </nav>

    <!-- Hero -->

    <section class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid md:grid-cols-2 gap-12 items-center">

            <div>

                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full">

                    Laravel POS System

                </span>

                <h1 class="text-6xl font-bold text-slate-900 mt-6 leading-tight">

                    Sistem Pengurusan
                    Kedai Makan

                </h1>

                <p class="text-slate-600 text-lg mt-6">

                    Sistem lengkap untuk mengurus
                    pesanan pelanggan, menu,
                    jualan harian dan laporan prestasi.

                </p>

                <div class="mt-8 flex gap-4">

                    <a href="{{ route('login') }}"
                       class="px-6 py-3 bg-blue-600 text-white rounded-xl shadow">

                        Cuba Sistem

                    </a>

                    <a href="#features"
                       class="px-6 py-3 bg-white rounded-xl border">

                        Lihat Ciri

                    </a>

                </div>

            </div>

            <div>

                <img
                    src="{{ asset('images/dashboard-preview.png') }}"
                    class="rounded-3xl shadow-2xl border"
                >

            </div>

        </div>

    </section>

    <!-- Features -->

    <section id="features"
             class="max-w-7xl mx-auto px-6 pb-20">

        <h2 class="text-4xl font-bold text-center mb-12">

            Ciri-Ciri Sistem

        </h2>

        <div class="grid md:grid-cols-4 gap-6">

            <div class="bg-white p-6 rounded-2xl shadow">

                <div class="text-4xl mb-4">

                    🛒

                </div>

                <h3 class="font-bold text-xl mb-2">

                    POS

                </h3>

                <p class="text-slate-500">

                    Sistem pesanan pelanggan
                    yang pantas dan mudah.

                </p>

            </div>

            <div class="bg-white p-6 rounded-2xl shadow">

                <div class="text-4xl mb-4">

                    🍛

                </div>

                <h3 class="font-bold text-xl mb-2">

                    Menu Management

                </h3>

                <p class="text-slate-500">

                    Tambah, edit dan aktifkan
                    menu dengan mudah.

                </p>

            </div>

            <div class="bg-white p-6 rounded-2xl shadow">

                <div class="text-4xl mb-4">

                    📊

                </div>

                <h3 class="font-bold text-xl mb-2">

                    Dashboard

                </h3>

                <p class="text-slate-500">

                    Statistik jualan dan
                    prestasi perniagaan.

                </p>

            </div>

            <div class="bg-white p-6 rounded-2xl shadow">

                <div class="text-4xl mb-4">

                    📋

                </div>

                <h3 class="font-bold text-xl mb-2">

                    Orders

                </h3>

                <p class="text-slate-500">

                    Semak semua pesanan
                    pelanggan secara teratur.

                </p>

            </div>

        </div>

    </section>

    <!-- Screenshot Section -->

    <section class="bg-white py-20">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-4xl font-bold mb-6">

                Dashboard Profesional

            </h2>

            <p class="text-slate-500 mb-10">

                Dibina menggunakan Laravel,
                Tailwind CSS dan Chart.js

            </p>

            <img
                src="{{ asset('images/dashboard-preview.png') }}"
                class="rounded-3xl shadow-2xl mx-auto border"
            >

        </div>

    </section>

    <!-- Footer -->

    <footer class="bg-slate-900 text-white py-8 mt-20">

        <div class="text-center">

            © {{ date('Y') }}
            Sistem Pengurusan Kedai Makan

        </div>

    </footer>

</body>
</html>