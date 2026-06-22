<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where(
    'user_id',
    auth()->id())
->latest()
->get();
    }

    public function detail($id)
    {
        $order = Order::with('items.menu')
    ->where('user_id', auth()->id())
    ->findOrFail($id);

    return response()->json($order);
    }
    
}