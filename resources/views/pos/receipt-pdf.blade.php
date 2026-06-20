<h2>Kedai Makan Arif</h2>

<p>
No Resit:
{{ $order->no_resit }}
</p>

<hr>

@foreach($order->items as $item)

<p>
{{ $item->menu->nama }}
x {{ $item->kuantiti }}

RM {{ number_format($item->subtotal,2) }}
</p>

@endforeach

<hr>

<h3>
Jumlah:
RM {{ number_format($order->jumlah_harga,2) }}
</h3>