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
        $menus = Menu::where(
        'user_id',
        auth()->id()
        )->get();


        return view('pos.index', compact('menus'));
    
    }

    public function store(Request $request)
    {
    $cart = json_decode($request->cart, true);

    if(empty($cart))
    {
        return redirect('/pos')
            ->with('error','Cart kosong');
    }

    $total = 0;

    foreach($cart as $item)
    {
        $total += $item['harga'] * $item['qty'];
    }

    $resit = 'RESIT-' . time();

    $order = Order::create([
    'user_id' => auth()->id(),
    'no_resit' => $resit,
    'jumlah_harga' => $total
    ]);

    foreach($cart as $item)
    {
        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $item['id'],
            'kuantiti' => $item['qty'],
            'harga' => $item['harga'],
            'subtotal' => $item['harga'] * $item['qty']
        ]);

        Sale::create([
            'user_id' => auth()->id(),
            'menu_id' => $item['id'],
            'kuantiti' => $item['qty'],
        ]);
    }

    return redirect('/pos')
        ->with(
            'success',
            'Order berjaya disimpan. No Resit: '.$order->no_resit
        );
    }

}
