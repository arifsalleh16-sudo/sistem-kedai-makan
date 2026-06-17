@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Kedai Makan</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-slate-100">

<div class="max-w-7xl mx-auto p-6">

    <div class="mb-8">
        <h1 class="text-4xl font-bold text-slate-800">
            Dashboard Kedai Makan
        </h1>

        <p class="text-slate-500">
            Ringkasan prestasi sistem
        </p>
    </div>

    <!-- Statistics -->

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <div class="bg-white p-6 rounded-2xl shadow">
            <p class="text-slate-500">
                Pendapatan
            </p>

            <h2 class="text-3xl font-bold mt-2">
                RM {{ number_format($jumlahSales) }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <p class="text-slate-500">
                Item Terjual
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $jumlahItemTerjual }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <p class="text-slate-500">
                Jumlah Menu
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $jumlahMenu }}
            </h2>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow">
            <p class="text-slate-500">
                Pengguna
            </p>

            <h2 class="text-3xl font-bold mt-2">
                {{ $jumlahUser }}
            </h2>
        </div>

    </div>

    <!-- Chart + Top Menu -->

    <div class="grid lg:grid-cols-3 gap-6 mb-8">

        <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow">

            <h3 class="text-xl font-semibold mb-4">
                Jualan Mengikut Hari
            </h3>

            <canvas id="salesChart"></canvas>

        </div>

        <div class="bg-white p-6 rounded-2xl shadow">

            <h3 class="text-xl font-semibold mb-4">
                Menu Paling Laris
            </h3>

            <h2 class="text-3xl font-bold">
                {{ $menuPalingLaris->menu->nama }}
            </h2>

            <p class="text-slate-500 mt-2">
                {{ $menuPalingLaris->jumlah }} Unit Terjual
            </p>

        </div>

    </div>

    <!-- Top Menu Table -->

    <div class="bg-white rounded-2xl shadow p-6">

        <h3 class="text-xl font-semibold mb-4">
            Top Menu Terlaris
        </h3>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">#</th>
                    <th class="text-left py-3">Nama Menu</th>
                    <th class="text-left py-3">Jumlah Jualan</th>

                </tr>

            </thead>

            <tbody>

                @foreach($topMenus as $menu)

                <tr class="border-b hover:bg-slate-50">

                    <td class="py-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="py-3">
                        {{ $menu->menu->nama }}
                    </td>

                    <td class="py-3">
                        {{ $menu->jumlah }}
                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<script>

new Chart(
    document.getElementById('salesChart'),
    {
        type: 'bar',
        data: {
            labels: ['Isnin','Selasa','Rabu','Khamis','Jumaat'],
            datasets: [{
                label: 'Jualan',
                data: [50,40,70,20,78]
            }]
        }
    }
);

</script>

</body>
</html>
@endsection