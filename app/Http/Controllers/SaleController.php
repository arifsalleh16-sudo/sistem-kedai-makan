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

        $jumlahSales += $sale->menu->harga * $sale->kuantiti;

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
    Sale::create([
        'menu_id' => $request->menu_id,
        'kuantiti' => $request->kuantiti,
    ]);

    return redirect('/sales');
    }
}