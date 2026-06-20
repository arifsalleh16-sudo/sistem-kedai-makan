@extends('layouts.app')

@section('content')

<div class="space-y-6">

<!-- Header -->

<div class="flex justify-between items-center">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">
            Rekod Jualan
        </h1>

        <p class="text-slate-500">
            Pantau semua transaksi jualan kedai
        </p>

    </div>

</div>

<!-- Statistik -->

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <div class="bg-white p-6 rounded-2xl shadow">

        <p class="text-slate-500">
            Jumlah Rekod
        </p>

        <h2 class="text-3xl font-bold">
            {{ $sales->count() }}
        </h2>

    </div>

    <div class="bg-white p-6 rounded-2xl shadow">

        <p class="text-slate-500">
            Item Terjual
        </p>

        <h2 class="text-3xl font-bold">
            {{ $sales->sum('kuantiti') }}
        </h2>

    </div>

    <div class="bg-white p-6 rounded-2xl shadow">

        <p class="text-slate-500">
            Jumlah Jualan
        </p>

        <h2 class="text-3xl font-bold text-green-600">

            RM {{ number_format(
                $sales->sum(function($sale){
                    return ($sale->menu?->harga ?? 0) * $sale->kuantiti;
                }),
                2
            ) }}

        </h2>

    </div>

</div>

<!-- Jadual -->

<div class="bg-white rounded-3xl shadow-lg p-6">

    <table id="salesTable" class="w-full">

        <thead>

            <tr class="bg-slate-100">

                <th class="text-left p-4">
                    Nama Menu
                </th>

                <th class="text-left p-4">
                    Harga
                </th>

                <th class="text-left p-4">
                    Kuantiti
                </th>

                <th class="text-left p-4">
                    Jumlah
                </th>

                <th class="text-left p-4">
                    Tarikh
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($sales as $sale)

            <tr class="hover:bg-slate-50 transition">

                <td class="p-4 font-medium">

                    {{ $sale->menu?->nama ?? 'Menu Dipadam' }}

                </td>

                <td class="p-4">

                    RM {{ number_format($sale->menu?->harga ?? 0, 2) }}

                </td>

                <td class="p-4">

                    {{ $sale->kuantiti }}

                </td>

                <td class="p-4 font-bold text-green-600">

                    RM {{
                        number_format(
                            ($sale->menu?->harga ?? 0) * $sale->kuantiti,
                            2
                        )
                    }}

                </td>

                <td class="p-4 text-slate-500">

                    {{ $sale->created_at->format('d M Y, H:i') }}

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</div>

<script>

$(document).ready(function () {

    $('#salesTable').DataTable({

        pageLength: 10,

        language: {

            search: "Cari:",

            lengthMenu: "Papar _MENU_ rekod",

            info: "Paparan _START_ hingga _END_ daripada _TOTAL_ rekod",

            paginate: {
                previous: "Sebelum",
                next: "Seterusnya"
            }

        }

    });

});

</script>

@endsection
