<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SaleController extends Controller
{

    public function create()
    {
        $menus = Menu::where('user_id', auth()->id())->get();

        return view('sales.create', [
            'menus' => $menus
        ]);
    }

     public function index()
    {

    $sales = Sale::where(
    'user_id',
    auth()->id()
    )->get();

    $jumlahSales = 0;

      foreach ($sales as $sale) {

        $jumlahSales += ($sale->menu?->harga ?? 0) * $sale->kuantiti;

        }

     $jualanHariIni = Sale::whereDate(
        'created_at',
         Carbon::today()
        )->count('id');
        
        $itemTerjualHariIni = Sale::whereDate(
        'created_at',
        Carbon::today()
        )->sum('kuantiti');

        $salesByDate = Sale::all()->groupBy(function ($sale) {
        return $sale->created_at->format('Y-m-d');
        });


    return view('sales.index', [
        'sales' => $sales,
        'jualanHariIni' => $jualanHariIni,
        'itemTerjualHariIni' => $itemTerjualHariIni,
        'jumlahSales' => $jumlahSales,
        'salesByDate' => $salesByDate
    ]);
    }

    public function store(Request $request)
    {

    $request->validate([
        'menu_id' => 'required|exists:menus,id',
        'kuantiti' => 'required|numeric|min:1'
    ],
     [
        'menu_id.required' => 'Menu wajib dipilih.',
        'menu_id.exists' => 'Menu yang dipilih tidak sah.',
        'kuantiti.required' => 'Kuantiti wajib diisi.',
        'kuantiti.numeric' => 'Kuantiti mesti nombor.',
        'kuantiti.min' => 'Kuantiti mesti sekurang-kurangnya 1.'
    ]
    );
    Sale::create([
    'user_id' => auth()->id(),
    'menu_id' => $item['id'],
    'kuantiti' => $item['qty'],
    'harga' => $item['harga']
    ]);
    

    return redirect('/sales');
    }
}