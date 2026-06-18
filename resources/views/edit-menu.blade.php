@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-2xl shadow p-8">

        <div class="mb-8">

            <h1 class="text-3xl font-bold text-slate-800">
                Edit Menu
            </h1>

            <p class="text-slate-500 mt-2">
                Kemaskini maklumat menu
            </p>

        </div>

        <form action="/menu/{{ $menu->id }}" method="POST">

            @csrf
            @method('PUT')

            <!-- Nama Menu -->

            <div class="mb-5">

                <label class="block mb-2 font-medium text-slate-700">
                    Nama Menu
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama', $menu->nama) }}"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                @error('nama')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Harga -->

            <div class="mb-5">

                <label class="block mb-2 font-medium text-slate-700">
                    Harga (RM)
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="harga"
                    value="{{ old('harga', $menu->harga) }}"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                @error('harga')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <!-- Kategori -->

            <div class="mb-8">

                <label class="block mb-2 font-medium text-slate-700">
                    Kategori
                </label>

                <select
                    name="category_id"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ $menu->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->nama }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Button -->

            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition">

                    Kemaskini Menu

                </button>

                <a href="/menu"
                   class="bg-slate-200 text-slate-700 px-6 py-3 rounded-xl hover:bg-slate-300 transition">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection