<?php

namespace App\Http\Controllers;

use App\Models\Sale;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Sale::with('menu')
            ->latest()
            ->get();

        return view('orders.index', compact('orders'));
    }
}