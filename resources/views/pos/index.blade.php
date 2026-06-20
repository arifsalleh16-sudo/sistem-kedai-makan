@extends('layouts.app')

@section('content')
<div class="grid grid-cols-12 gap-6">

    <div class="col-span-12 lg:col-span-8">

    <!-- MAKANAN -->
    <h3 class="text-2xl font-bold mb-4">
        🍛 Makanan
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">

        @foreach($menus->where('category.nama', 'Makanan') as $menu)

        <div class="bg-white rounded-xl shadow p-3 hover:shadow-lg hover:scale-105 transition cursor-pointer">

            <h4 class="font-semibold text-sm">
                {{ $menu->nama }}
            </h4>

            <p class="text-green-600 font-bold text-lg my-2">
                RM {{ number_format($menu->harga,2) }}
            </p>

            <button
                class="w-full bg-blue-600 text-white py-2 rounded-lg text-sm tambah-menu"
                data-id="{{ $menu->id }}"
                data-nama="{{ $menu->nama }}"
                data-harga="{{ $menu->harga }}">
                Tambah
            </button>

        </div>

        @endforeach

    </div>

    <!-- MINUMAN -->
    <h3 class="text-2xl font-bold mb-4">
        🥤 Minuman
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">

        @foreach($menus->where('category.nama', 'Minuman') as $menu)

        <div class="bg-white rounded-xl shadow p-3 hover:shadow-lg hover:scale-105 transition cursor-pointer">

            <h4 class="font-semibold text-sm">
                {{ $menu->nama }}
            </h4>

            <p class="text-green-600 font-bold text-lg my-2">
                RM {{ number_format($menu->harga,2) }}
            </p>

            <button
                class="w-full bg-blue-600 text-white py-2 rounded-lg text-sm tambah-menu"
                data-id="{{ $menu->id }}"
                data-nama="{{ $menu->nama }}"
                data-harga="{{ $menu->harga }}">
                Tambah
            </button>

        </div>

        @endforeach

    </div>

    <!-- DESSERT -->
    <h3 class="text-2xl font-bold mb-4">
        🍰 Dessert
    </h3>

    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-3">

        @foreach($menus->where('category.nama', 'Dessert') as $menu)

        <div class="bg-white rounded-xl shadow p-3 hover:shadow-lg hover:scale-105 transition cursor-pointer">

            <h4 class="font-semibold text-sm">
                {{ $menu->nama }}
            </h4>

            <p class="text-green-600 font-bold text-lg my-2">
                RM {{ number_format($menu->harga,2) }}
            </p>

            <button
                class="w-full bg-blue-600 text-white py-2 rounded-lg text-sm tambah-menu"
                data-id="{{ $menu->id }}"
                data-nama="{{ $menu->nama }}"
                data-harga="{{ $menu->harga }}">
                Tambah
            </button>

        </div>

        @endforeach

    </div>

</div>

<div class="col-span-12 lg:col-span-4">

    <div class="bg-white rounded-3xl shadow-lg p-6 sticky top-5">

    <div class="flex justify-between items-center mb-4">

        <h3 class="text-2xl font-bold">
            🛒 Cart
        </h3>

        <span
            id="cartCount"
            class="bg-red-500 text-white px-3 py-1 rounded-full">
            0
        </span>

    </div>

    <table id="cartTable" class="w-full mb-4">

        <thead>
            <tr class="border-b">
                <th class="text-left">Menu</th>
                <th>Qty</th>
                <th>Jumlah</th>
                <th></th>
            </tr>
        </thead>

        <tbody>

        </tbody>

    </table>

    <hr class="my-4">

    <h3 class="text-2xl font-bold text-green-600 mb-4">
        RM <span id="grandTotal">0.00</span>
    </h3>

    <form action="/pos/store" method="POST">

        @csrf

        <input
            type="hidden"
            name="cart"
            id="cartInput">

        <button
            class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl">

            Simpan Order

        </button>

    </form>

    </div>

    </div>

</div>

<script>

let cart = [];

function refreshCart()
{
    let tbody = document.querySelector('#cartTable tbody');

    tbody.innerHTML = '';

    let total = 0;

    cart.forEach(item => {

        let subtotal = item.harga * item.qty;

        total += subtotal;

        tbody.innerHTML += `
        <tr class="border-b">

            <td class="py-2">
                ${item.nama}
            </td>

            <td>

                <button
                    onclick="kurangQty(${item.id})"
                    type="button"
                    class="bg-red-500 text-white px-2 rounded">
                    -
                </button>

                <span class="mx-2">
                    ${item.qty}
                </span>

                <button
                    onclick="tambahQty(${item.id})"
                    type="button"
                    class="bg-green-500 text-white px-2 rounded">
                    +
                </button>

            </td>

            <td>
                RM ${subtotal.toFixed(2)}
            </td>

            <td>

                <button
                    onclick="hapusItem(${item.id})"
                    type="button"
                    class="text-red-600">

                    🗑️

                </button>

            </td>

        </tr>
        `;
    });

    document.getElementById('grandTotal').innerText =
        total.toFixed(2);

    document.getElementById('cartCount').innerText =
        cart.reduce((sum,item) => sum + item.qty, 0);

    document.getElementById('cartInput').value =
        JSON.stringify(cart);
}

function tambahQty(id)
{
    let item = cart.find(x => x.id == id);

    if(item)
    {
        item.qty++;
    }

    refreshCart();
}

function kurangQty(id)
{
    let item = cart.find(x => x.id == id);

    if(item && item.qty > 1)
    {
        item.qty--;
    }

    refreshCart();
}

function hapusItem(id)
{
    cart = cart.filter(x => x.id != id);

    refreshCart();
}

document.querySelectorAll('.tambah-menu').forEach(btn => {

    btn.addEventListener('click', function(){

        let id = this.dataset.id;
        let nama = this.dataset.nama;
        let harga = parseFloat(this.dataset.harga);

        let existing = cart.find(x => x.id == id);

        if(existing)
        {
            existing.qty++;
        }
        else
        {
            cart.push({
                id: id,
                nama: nama,
                harga: harga,
                qty: 1
            });
        }

        refreshCart();

    });

});

refreshCart();

</script>

@endsection