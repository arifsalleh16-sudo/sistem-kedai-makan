@extends('layouts.app')

@section('content')

<div class="bg-white rounded-3xl shadow-lg p-6">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Order Management
            </h1>

            <p class="text-slate-500">
                Senarai pesanan pelanggan
            </p>

        </div>

    </div>

    <table id="ordersTable" class="w-full">

        <thead>

            <tr class="bg-slate-100">

                <th class="p-4 text-left">ID</th>
                <th class="p-4 text-left">Menu</th>
                <th class="p-4 text-left">Kuantiti</th>
                <th class="p-4 text-left">Harga</th>
                <th class="p-4 text-left">Tarikh</th>
                <th class="p-4 text-center">Tindakan</th>

            </tr>

        </thead>

        <tbody>

            @foreach($orders as $order)

            <tr class="border-b">

                <td class="p-4">
                    #{{ $order->id }}
                </td>

                <td class="p-4">
                    {{ $order->menu->nama }}
                </td>

                <td class="p-4">
                    {{ $order->kuantiti }}
                </td>

                <td class="p-4">

                    RM {{ number_format($order->menu->harga * $order->kuantiti,2) }}

                </td>

                <td class="p-4">

                    {{ $order->created_at->format('d M Y H:i') }}

                </td>

                <td class="p-4 text-center">

                    <button

                        onclick="showDetail(
                            '{{ $order->menu->nama }}',
                            '{{ $order->kuantiti }}',
                            '{{ number_format($order->menu->harga * $order->kuantiti,2) }}',
                            '{{ $order->created_at->format('d M Y H:i') }}'
                        )"

                        class="bg-blue-600 text-white px-4 py-2 rounded-lg">

                        Detail

                    </button>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

<!-- Modal -->

<div
id="detailModal"
class="fixed inset-0 bg-black/50 hidden justify-center items-center z-50">

    <div class="bg-white rounded-2xl p-6 w-full max-w-md">

        <div class="flex justify-between mb-4">

            <h2 class="font-bold text-xl">
                Detail Order
            </h2>

            <button
                onclick="closeModal()">

                ✖

            </button>

        </div>

        <div id="modalContent">

        </div>

    </div>

</div>

<script>

function showDetail(menu, qty, jumlah, tarikh)
{
    document.getElementById('modalContent').innerHTML = `

        <div class="space-y-3">

            <p><strong>Menu:</strong> ${menu}</p>

            <p><strong>Kuantiti:</strong> ${qty}</p>

            <p><strong>Jumlah:</strong> RM ${jumlah}</p>

            <p><strong>Tarikh:</strong> ${tarikh}</p>

        </div>

    `;

    document.getElementById('detailModal')
        .classList.remove('hidden');

    document.getElementById('detailModal')
        .classList.add('flex');
}

function closeModal()
{
    document.getElementById('detailModal')
        .classList.add('hidden');

    document.getElementById('detailModal')
        .classList.remove('flex');
}

new DataTable('#ordersTable');

</script>

@endsection