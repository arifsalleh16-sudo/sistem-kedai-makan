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
        $jumlahMenu = Menu::count();

        $jumlahUser = User::count();

        $jumlahMenuMakanan = Menu::where('kategori', 'makanan')->count();

        $jumlahMenuMinuman = Menu::where('kategori', 'minuman')->count();

        $jumlahMenuDessert = Menu::where('kategori', 'dessert')->count();

        $menuMakananPalingMahal = Menu::where('kategori', 'makanan')->orderBy('harga', 'desc')->first();  

        $menuMakananPalingMurah = Menu::where('kategori', 'makanan')->orderBy('harga', 'asc')->first();

        $jumlahNilaiSemuaMenu = Menu::sum('harga');

        $jumlahItemTerjual = Sale::sum('kuantiti');

        $jumlahSales = 0;

        $sales = Sale::all();

        foreach ($sales as $sale) {

        $jumlahSales += $sale->menu->harga * $sale->kuantiti;

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
            'itemTerjualHariIni' => $itemTerjualHariIni
        ]);
    }
}