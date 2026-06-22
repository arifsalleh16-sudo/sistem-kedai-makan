<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahMenu = Menu::where(
        'user_id',
        auth()->id()
        )->count();

        $jumlahUser = User::count();

        $jumlahMenuMakanan = Menu::where('category_id', 1)->count();

        $jumlahMenuMinuman = Menu::where('category_id', 2)->count();

        $jumlahMenuDessert = Menu::where('category_id', 3)->count();

        $menuMakananPalingMahal = Menu::where('category_id', 1)->orderBy('harga', 'desc')->first();  

        $menuMakananPalingMurah = Menu::where('category_id', 1)->orderBy('harga', 'asc')->first();

        $jumlahNilaiSemuaMenu = Menu::sum('harga');

        $jumlahItemTerjual = Sale::sum('kuantiti');

        $jumlahSales = 0;

        $sales = Sale::all();

        foreach ($sales as $sale) {

          if ($sale->menu) {
        $jumlahSales += ($sale->menu?->harga ?? 0) * $sale->kuantiti;
         }

        }

        $menuPalingLaris = Sale::select(
        'menu_id',
        DB::raw('SUM(kuantiti) as jumlah')
        )
            ->groupBy('menu_id')
            ->orderByDesc('jumlah')
            ->first();

        $jualanHariIni = Sale::whereDate(
        'created_at',
         Carbon::today()
        )->count();
        
        $itemTerjualHariIni = Sale::whereDate(
        'created_at',
        Carbon::today()
        )->sum('kuantiti');

        $topMenus = Sale::selectRaw('menu_id, SUM(kuantiti) as jumlah')
         ->groupBy('menu_id')
         ->orderByDesc('jumlah')
         ->take(5)
         ->get();

        $salesByDate = Sale::join('menus', 'sales.menu_id', '=', 'menus.id')
         ->selectRaw('
        DATE(sales.created_at) as tarikh,
        SUM(menus.harga * sales.kuantiti) as jumlah
        ')
          ->groupBy('tarikh')
          ->orderBy('tarikh')
          ->get();

        $chartLabels = $salesByDate->pluck('tarikh');
        $chartData = $salesByDate->pluck('jumlah');

        return view('dashboard', [
            'jumlahMenu' => $jumlahMenu,
            'jumlahUser' => $jumlahUser,
            'jumlahMenuMakanan' => $jumlahMenuMakanan,
            'jumlahMenuMinuman' => $jumlahMenuMinuman,
            'jumlahMenuDessert' => $jumlahMenuDessert,
            'menuMakananPalingMahal' => $menuMakananPalingMahal,
            'menuMakananPalingMurah' => $menuMakananPalingMurah,
            'jumlahNilaiSemuaMenu' => $jumlahNilaiSemuaMenu,
            'jumlahSales' => $jumlahSales,
            'jumlahItemTerjual' => $jumlahItemTerjual,
            'menuPalingLaris' => $menuPalingLaris,
            'jualanHariIni' => $jualanHariIni,
            'itemTerjualHariIni' => $itemTerjualHariIni,
            'topMenus' => $topMenus,
            "chartLabels" => $chartLabels,
            "chartData" => $chartData,
        ]);

    }
}