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
    $cart = json_decode($request->cart, true);

    if(empty($cart))
    {
        return back()
            ->with('error', 'Troli kosong');
    }

    foreach($cart as $item)
    {
        Sale::create([

            'menu_id' => $item['id'],

            'kuantiti' => $item['qty']

        ]);
    }

    return redirect('/sales')
        ->with('success', 'Order berjaya disimpan');
    }

    

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

    return redirect()
        ->route('receipt', $order->id);
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

