<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Category;


class MenuController extends Controller
{

public function index(Request $request)
{
    $search = $request->search;

    $menus = Menu::where(
        'nama',
        'like',
        "%{$search}%"
    )->get();

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
        'kategori' => 'required'
    ],
     [
        'nama.required' => 'Nama menu wajib diisi.',
        'harga.required' => 'Harga wajib diisi.',
        'harga.numeric' => 'Harga mesti nombor.',
        'kategori.required' => 'Kategori wajib diisi.'
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

    return view('edit-menu', [
        'menu' => $menu
    ]);
}

public function update(Request $request, $id)
{
    $menu = Menu::find($id);

    $menu->update([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'kategori' => $request->kategori
    ]);

    return redirect('/menu');
}

public function destroy($id)
{
    $menu = Menu::find($id);

    $menu->delete();

    return redirect('/menu');
}
}
       
