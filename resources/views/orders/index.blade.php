@extends('layouts.app')

@section('content')

<div class="bg-white rounded-3xl shadow-lg p-6">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">
                Pengurusan Pesanan
            </h1>

            <p class="text-slate-500">
                Senarai pesanan pelanggan
            </p>

        </div>

    </div>

    <table id="ordersTable" class="w-full">

        <thead>

            <tr class="bg-slate-100">

                <th class="p-4 text-left">No. Resit</th>
                <th class="p-4 text-left">Jumlah</th>
                <th class="p-4 text-left">Tarikh</th>
                <th class="p-4 text-left">Status</th>
                <th class="p-4 text-center">Tindakan</th>

            </tr>

        </thead>

        <tbody>

            @foreach($orders as $order)

        <tr class="border-b">

            <td class="p-4 font-semibold">
                {{ $order->no_resit }}
            </td>

            <td class="p-4 text-green-600 font-bold">
                RM {{ number_format($order->jumlah_harga,2) }}
            </td>

            <td class="p-4">
                {{ $order->created_at->format('d M Y H:i') }}
            </td>

            <td class="p-4">
                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full">
                Selesai
                </span>
            </td>

            <td class="p-4">

        <button onclick="showDetail({{ $order->id }})" class="bg-blue-600 text-white px-4 py-2 rounded-lg">

        Butiran

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
                Butiran Pesanan
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

async function showDetail(orderId)
{
    const response =
        await fetch('/orders/' + orderId + '/detail');

    const order =
        await response.json();

    let html = `

        <div class="space-y-3">

            <div class="border-b pb-3">

                <h3 class="font-bold text-lg">
                    ${order.no_resit}
                </h3>

                <p class="text-slate-500">
                    ${order.created_at}
                </p>

            </div>

    `;

    order.items.forEach(item => {

        html += `

            <div class="flex justify-between border-b py-2">

                <div>

                    <p class="font-semibold">

                        ${item.menu.nama}

                    </p>

                    <p class="text-sm text-slate-500">

                        Kuantiti: ${item.kuantiti}

                    </p>

                </div>

                <div class="font-bold text-green-600">

                    RM ${parseFloat(item.subtotal).toFixed(2)}

                </div>

            </div>

        `;

    });

    html += `

        <div class="flex justify-between mt-4 pt-4 border-t">

            <span class="font-bold">
                Jumlah
            </span>

            <span class="font-bold text-xl text-green-600">

                RM ${parseFloat(order.jumlah_harga).toFixed(2)}

            </span>

        </div>

        </div>

    `;

    document.getElementById('modalContent')
        .innerHTML = html;

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

</script>

@endsection