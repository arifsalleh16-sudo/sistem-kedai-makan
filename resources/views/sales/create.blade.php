@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="mb-8">

            <h1 class="text-3xl font-bold text-slate-800">
                Tambah Jualan
            </h1>

            <p class="text-slate-500 mt-2">
                Rekod transaksi jualan baru
            </p>

        </div>

        <form action="/sales" method="POST">

            @csrf

            <!-- Menu -->

            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Pilih Menu
                </label>

                <select
                    id="menuSelect"
                    name="menu_id"
                    class="w-full border rounded-xl px-4 py-3">

                    @foreach($menus as $menu)

                    <option
                        value="{{ $menu->id }}"
                        data-price="{{ $menu->harga }}">

                        {{ $menu->nama }}

                    </option>

                    @endforeach

                </select>

            </div>

            <!-- Harga -->

            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Harga Seunit
                </label>

                <div
                    id="hargaDisplay"
                    class="bg-slate-100 rounded-xl p-4 text-xl font-bold text-green-600">

                    RM 0.00

                </div>

            </div>

            <!-- Kuantiti -->

            <div class="mb-5">

                <label class="block mb-2 font-medium">
                    Kuantiti
                </label>

                <input
                    type="number"
                    id="kuantiti"
                    name="kuantiti"
                    min="1"
                    value="1"
                    class="w-full border rounded-xl px-4 py-3">

            </div>

            <!-- Jumlah -->

            <div class="mb-8">

                <label class="block mb-2 font-medium">
                    Jumlah Bayaran
                </label>

                <div
                    id="jumlahDisplay"
                    class="bg-green-100 rounded-xl p-4 text-2xl font-bold text-green-700">

                    RM 0.00

                </div>

            </div>

            <!-- Button -->

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700">

                    Simpan Jualan

                </button>

                <a href="/sales"
                   class="bg-slate-200 px-6 py-3 rounded-xl">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

<script>

const menuSelect = document.getElementById('menuSelect');
const kuantiti = document.getElementById('kuantiti');
const hargaDisplay = document.getElementById('hargaDisplay');
const jumlahDisplay = document.getElementById('jumlahDisplay');

function kiraJumlah() {

    const selectedOption =
        menuSelect.options[menuSelect.selectedIndex];

    const harga =
        parseFloat(selectedOption.dataset.price);

    const qty =
        parseInt(kuantiti.value) || 0;

    const jumlah =
        harga * qty;

    hargaDisplay.innerHTML =
        'RM ' + harga.toFixed(2);

    jumlahDisplay.innerHTML =
        'RM ' + jumlah.toFixed(2);
}

menuSelect.addEventListener('change', kiraJumlah);
kuantiti.addEventListener('input', kiraJumlah);

kiraJumlah();

</script>

@endsection