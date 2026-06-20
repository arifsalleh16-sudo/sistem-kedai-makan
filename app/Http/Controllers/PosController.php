<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
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

    $total = 0;

    foreach ($cart as $item)
    {
        $total += $item['harga'] * $item['qty'];
    }

    $order = Order::create([
        'total' => $total
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

