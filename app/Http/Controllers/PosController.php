<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Sale;



class PosController extends Controller
{
    public function index()
    {
        $menus = Menu::all();

        return view('pos.index', compact('menus'));
    
    }

    public function store(Request $request)
    {
    $cart = session('cart', []);

    $jumlah_harga = 0;

    foreach ($cart as $item)
    {
        $jumlah_harga += $item['harga'] * $item['qty'];
    }

    $order = Order::create([
        'no_resit' => 'RESIT-' . time(),
        'jumlah_harga' => $jumlah_harga
    ]);

    foreach ($cart as $item)
    {
        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $item['id'],
            'kuantiti' => $item['qty'],
            'harga' => $item['harga'],
            'subtotal' => $item['harga'] * $item['qty']
        ]);
    }

    session()->forget('cart');

    return redirect('/pos')
        ->with('success', 'Order berjaya disimpan');
    }

    public function receipt($id)
    {
        $order = Order::with('items.menu')
                ->findOrFail($id);

        return view('pos.receipt', compact('order'));
    }

    public function pdf($id)
    {
        $order = Order::with('items.menu')
        ->findOrFail($id);

        $pdf = Pdf::loadView(
        'pos.receipt-pdf',
        compact('order')
    );

        return $pdf->download(
        $order->no_resit . '.pdf'
    );
    }

}

