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
        $menus = Menu::all();

        return view('sales.create', [
            'menus' => $menus
        ]);
    }

     public function index()
    {

    $sales = Sale::all();

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
        'menu_id' => $request->menu_id,
        'nama_menu' => $request->nama_menu,
        'harga_semasa' => $request->harga_semasa,
        'kuantiti' => $request->kuantiti
    ]);

    return redirect('/sales');
    }
}