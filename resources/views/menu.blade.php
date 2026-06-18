@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-4">
    {{ session('success') }}
</div>
@endif

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

        <table id="menuTable" class="w-full">

            <thead>

                <tr class="bg-slate-100">

                    <th class="text-left p-4">Nama Menu</th>
                    <th class="text-left p-4">Kategori</th>
                    <th class="text-left p-4">Harga</th>
                    <th class="text-left p-4">Status</th>
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

                    <td class="p-4">

                        @if($menu->is_active)
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">Aktif</span>
                        @else
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">Tidak Aktif</span>
                        @endif

                    </td>

                    <td class="p-4 text-center">

                        <form action="/menu/{{ $menu->id }}/toggle-status" method="POST" style="display:inline;">
                         @csrf
                         @method('PATCH')

                          @if($menu->is_active)

                         <button class="px-3 py-1 rounded-full bg-yellow-500 text-yellow-700 text-sm" onclick="return confirm('Nyahaktif menu ini?')">
                         Nyahaktif
                         </button>

                         @else

                        <button class="px-3 py-1 rounded-full bg-green-500 text-green-700 text-sm" onclick="return confirm('Aktifkan semula menu ini?')">
                        Aktifkan
                        </button>
                         @endif
                        </form>

                         <a href="/menu/{{ $menu->id }}/edit"
                           class="px-3 py-1 rounded-full bg-blue-500 text-white text-sm">
                            Kemaskini
                        </a>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>
@endsection

<script>

new DataTable('#menuTable', {

    pageLength: 5,

    lengthMenu: [
        [5,10,25,50],
        [5,10,25,50]
    ],

    language: {

        search: "Cari:",

        lengthMenu: "Papar _MENU_ rekod",

        info: "Paparan _START_ hingga _END_ daripada _TOTAL_ rekod",

        paginate: {
            previous: "Sebelum",
            next: "Seterusnya"
        }

    }

});

</script>