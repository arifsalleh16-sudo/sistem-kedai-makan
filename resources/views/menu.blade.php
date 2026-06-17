@extends('layouts.app')

@section('content')

<div class="grid md:grid-cols-4 gap-4 mb-6">

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-slate-500">Jumlah Menu</p>
        <h2 class="text-3xl font-bold">{{ $jumlahMenu }}</h2>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-slate-500">Makanan</p>
        <h2 class="text-3xl font-bold">{{ $jumlahMenuMakanan }}</h2>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-slate-500">Minuman</p>
        <h2 class="text-3xl font-bold">{{ $jumlahMenuMinuman }}</h2>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-slate-500">Dessert</p>
        <h2 class="text-3xl font-bold">{{ $jumlahMenuDessert }}</h2>
    </div>

</div>

<div class="bg-white rounded-2xl shadow p-6">

    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Menu Management
            </h1>

            <p class="text-slate-500">
                Urus semua menu makanan dan minuman
            </p>
        </div>

        <a href="/menu/create"
           class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
            + Tambah Menu
        </a>

    </div>

    <form method="GET" class="mb-6">

        <input
            type="text"
            name="search"
            placeholder="Cari menu..."
            class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

    </form>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-slate-100">

                    <th class="text-left p-4">Nama Menu</th>
                    <th class="text-left p-4">Kategori</th>
                    <th class="text-left p-4">Harga</th>
                    <th class="text-center p-4">Tindakan</th>

                </tr>

            </thead>

            <tbody>

                @foreach($menus as $menu)

                <tr class="border-b hover:bg-slate-50">

                    <td class="p-4 font-medium">
                        {{ $menu->nama }}
                    </td>

                    <td class="p-4">

                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm">

                            {{ $menu->category->nama }}

                        </span>

                    </td>

                    <td class="p-4 font-semibold">

                        RM {{ number_format($menu->harga,2) }}

                    </td>

                    <td class="p-4 text-center">

                        <a href="/menu/{{ $menu->id }}/edit"
                           class="bg-yellow-500 text-white px-3 py-2 rounded-lg">
                            Edit
                        </a>

                        <form action="/menu/{{ $menu->id }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button
                                class="bg-red-500 text-white px-3 py-2 rounded-lg ml-2">
                                Delete
                            </button>
                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>
@endsection