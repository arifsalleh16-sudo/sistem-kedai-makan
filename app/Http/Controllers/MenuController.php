<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sale;


class MenuController extends Controller
{

public function index(Request $request)
{
    $search = $request->search;

    //$menus = Menu::where('is_active', 1)
    //    ->when($search, function ($query) use ($search) {
    //        $query->where('nama', 'like', "%{$search}%");
    //    })
    //    ->get();

    $menus = Menu::all();
    return view('menu', [
        'menus' => $menus
    ]);
}


public function create()
{
    $categories = Category::all();

    return view('create-menu', [
        'categories' => $categories
    ]);
}

public function store(Request $request)
{

    $request->validate([
        'nama' => 'required',
        'harga' => 'required|numeric|min:0',
        'category_id' => 'required'
    ],
     [
        'nama.required' => 'Nama menu wajib diisi.',
        'harga.required' => 'Harga wajib diisi.',
        'harga.numeric' => 'Harga mesti nombor.',
        'category_id.required' => 'Kategori wajib diisi.'
    ]
);

    Menu::create([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'category_id' => $request->category_id
    ]);

    return redirect('/menu');
}

public function edit($id)
{
    $menu = Menu::find($id);

    $categories = Category::all();

    return view('edit-menu', [
        'menu' => $menu,
        'categories' => $categories
    ]);
}

public function update(Request $request, $id)
{
    $menu = Menu::find($id);

    $menu->update([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'category_id' => $request->category_id
    ]);

    return redirect('/menu');
}

public function toggleStatus(Menu $menu)
{
    $menu->is_active = !$menu->is_active;

    $menu->save();

    return redirect('/menu');
}

public function destroy($id)
{
    $menu = Menu::findOrFail($id);

    $menu->is_active = !$menu->is_active;

    $menu->save();

    return redirect('/menu');
}
}
       
