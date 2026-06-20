@extends('layouts.app')

@section('content')

<div class="space-y-6">

```
<!-- Header -->

<div>

    <h1 class="text-3xl font-bold text-slate-800">
        Order Management
    </h1>

    <p class="text-slate-500">
        Senarai semua pesanan pelanggan
    </p>

</div>

<!-- Statistik -->

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <div class="bg-white rounded-2xl shadow p-6">

        <p class="text-slate-500">
            Jumlah Order
        </p>

        <h2 class="text-3xl font-bold">
            {{ $orders->count() }}
        </h2>

    </div>

    <div class="bg-white rounded-2xl shadow p-6">

        <p class="text-slate-500">
            Order Hari Ini
        </p>

        <h2 class="text-3xl font-bold text-blue-600">

            {{ $orders->where('created_at', '>=', now()->startOfDay())->count() }}

        </h2>

    </div>

    <div class="bg-white rounded-2xl shadow p-6">

        <p class="text-slate-500">
            Jumlah Jualan
        </p>

        <h2 class="text-3xl font-bold text-green-600">

            RM {{ number_format($orders->sum('total_amount'),2) }}

        </h2>

    </div>

</div>

<!-- Table -->

<div class="bg-white rounded-3xl shadow-lg p-6">

    <table id="ordersTable" class="w-full">

        <thead>

            <tr class="bg-slate-100">

                <th class="text-left p-4">
                    No Order
                </th>

                <th class="text-left p-4">
                    Tarikh
                </th>

                <th class="text-left p-4">
                    Jumlah
                </th>

                <th class="text-left p-4">
                    Status
                </th>

                <th class="text-center p-4">
                    Tindakan
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($orders as $order)

            <tr class="hover:bg-slate-50">

                <td class="p-4 font-semibold">

                    #{{ $order->id }}

                </td>

                <td class="p-4">

                    {{ $order->created_at->format('d M Y H:i') }}

                </td>

                <td class="p-4 font-bold text-green-600">

                    RM {{ number_format($order->total_amount,2) }}

                </td>

                <td class="p-4">

                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm">

                        Selesai

                    </span>

                </td>

                <td class="p-4 text-center">

                    <button

                        onclick="showOrderDetail(
                            '{{ $order->id }}',
                            '{{ $order->created_at->format('d M Y H:i') }}',
                            '{{ number_format($order->total_amount,2) }}'
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
```

</div>

<!-- Modal -->

<div
    id="detailModal"
    class="fixed inset-0 bg-black/50 hidden justify-center items-center z-50">

```
<div class="bg-white rounded-2xl w-full max-w-lg p-6">

    <div class="flex justify-between items-center mb-4">

        <h2 class="text-xl font-bold">

            Detail Order

        </h2>

        <button
            onclick="closeModal()"
            class="text-red-500 text-xl">

            ✖

        </button>

    </div>

    <div id="modalContent">

    </div>

</div>
```

</div>

<script>

function showOrderDetail(id, tarikh, jumlah)
{
    document.getElementById('modalContent').innerHTML = `

        <div class="space-y-3">

            <p>
                <strong>No Order:</strong>
                #${id}
            </p>

            <p>
                <strong>Tarikh:</strong>
                ${tarikh}
            </p>

            <hr>

            <p class="text-green-600 font-bold text-xl">

                Jumlah:
                RM ${jumlah}

            </p>

            <p class="text-slate-500 text-sm">

                Di sini nanti boleh paparkan
                makanan, minuman dan dessert
                yang dipesan.

            </p>

        </div>

    `;

    document
        .getElementById('detailModal')
        .classList.remove('hidden');

    document
        .getElementById('detailModal')
        .classList.add('flex');
}

function closeModal()
{
    document
        .getElementById('detailModal')
        .classList.add('hidden');

    document
        .getElementById('detailModal')
        .classList.remove('flex');
}

$(document).ready(function () {

    $('#ordersTable').DataTable({

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
