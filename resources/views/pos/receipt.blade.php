@extends('layouts.app')

@section('content')

<div class="max-w-md mx-auto">

```
<div class="bg-white rounded-3xl shadow-lg p-8">

    <div class="text-center">

        <h1 class="text-2xl font-bold">
            🍽️ Kedai Makan
        </h1>

        <p class="text-slate-500 text-sm mt-2">
            Sistem POS
        </p>

    </div>

    <hr class="my-5">

    <div class="space-y-1 text-sm">

        <p>
            <strong>No Resit:</strong>
            {{ $receiptNumber }}
        </p>

        <p>
            <strong>Tarikh:</strong>
            {{ now()->format('d M Y, h:i A') }}
        </p>

    </div>

    <hr class="my-5">

    <table class="w-full">

        <thead>

            <tr class="text-left text-sm">

                <th>Menu</th>
                <th class="text-center">Qty</th>
                <th class="text-right">Jumlah</th>

            </tr>

        </thead>

        <tbody>

            @php
                $grandTotal = 0;
            @endphp

            @foreach($items as $item)

            @php
                $subtotal = $item['qty'] * $item['harga'];
                $grandTotal += $subtotal;
            @endphp

            <tr>

                <td class="py-2">
                    {{ $item['nama'] }}
                </td>

                <td class="text-center">
                    {{ $item['qty'] }}
                </td>

                <td class="text-right">

                    RM {{ number_format($subtotal,2) }}

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <hr class="my-5">

    <div class="flex justify-between items-center">

        <span class="font-bold text-lg">
            JUMLAH
        </span>

        <span class="font-bold text-green-600 text-xl">

            RM {{ number_format($grandTotal,2) }}

        </span>

    </div>

    <hr class="my-5">

    <div class="text-center">

        <p class="text-slate-500 text-sm">
            Terima Kasih
        </p>

        <p class="text-slate-500 text-sm">
            Sila Datang Lagi
        </p>

    </div>

    <a
        href="/receipt/pdf/{{ $receiptNumber }}"
        class="block text-center mt-6 bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700">

        Download PDF

    </a>

</div>
```

</div>

@endsection
