@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-body">

            <h2>Kedai Makan</h2>

            <hr>

            <h5>
                No Resit:
                {{ $order->no_resit }}
            </h5>

            <p>
                Tarikh:
                {{ $order->created_at }}
            </p>

            <table class="table">

                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($order->items as $item)

                <tr>

                    <td>
                        {{ $item->menu->nama }}
                    </td>

                    <td>
                        {{ $item->kuantiti }}
                    </td>

                    <td>
                        RM {{ number_format($item->harga,2) }}
                    </td>

                    <td>
                        RM {{ number_format($item->subtotal,2) }}
                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

            <hr>

            <h3>
                Jumlah:
                RM {{ number_format($order->jumlah_harga,2) }}
            </h3>

        </div>

        <a href="{{ route('receipt.pdf',$order->id) }}" class="btn btn-danger"> Download PDF </a>

    </div>

</div>

@endsection