@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">🛒 Order POS</h2>

    <div class="row">

        <!-- MENU -->
        <div class="col-md-8">

            <div class="row">

                @foreach($menus as $menu)

                <div class="col-md-4 mb-3">

                    <div class="card shadow-sm">

                        <div class="card-body">

                            <h5>{{ $menu->nama }}</h5>

                            <p class="text-success">
                                RM {{ number_format($menu->harga,2) }}
                            </p>

                            <button
                                class="btn btn-primary tambah-menu"
                                data-id="{{ $menu->id }}"
                                data-nama="{{ $menu->nama }}"
                                data-harga="{{ $menu->harga }}"
                            >
                                Tambah
                            </button>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

        <!-- TROLI -->
        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-header">
                    Troli Pesanan
                </div>

                <div class="card-body">

                    <table class="table" id="cartTable">

                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th>Qty</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>

                    </table>

                    <hr>

                    <h4>
                        Jumlah:
                        RM <span id="grandTotal">0.00</span>
                    </h4>

                    <button class="btn btn-success w-100 mt-3">
                        Simpan Order
                    </button>

                </div>

            </div>

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
        <tr>
            <td>${item.nama}</td>
            <td>${item.qty}</td>
            <td>RM ${subtotal.toFixed(2)}</td>
        </tr>
        `;
    });

    document.getElementById('grandTotal').innerText =
        total.toFixed(2);
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
                id:id,
                nama:nama,
                harga:harga,
                qty:1
            });
        }

        refreshCart();

    });

});

</script>

@endsection