@extends('layouts.guest')

@section('content')

<div class="min-h-screen bg-slate-100 flex items-center justify-center p-6">

    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden max-w-6xl w-full grid md:grid-cols-2">

        <!-- LEFT SIDE -->

        <div class="bg-slate-900 text-white p-10 flex flex-col justify-center">

            <div>

                <h1 class="text-5xl font-bold mb-4">
                    🍽️ Kedai Makan POS
                </h1>

                <p class="text-slate-300 text-lg mb-8">
                    Daftar akaun untuk mula menggunakan Sistem Pengurusan Kedai Makan.
                </p>

                <div class="space-y-4">

                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✓</span>
                        Dashboard Analitik
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✓</span>
                        Sistem POS
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✓</span>
                        Pengurusan Pesanan
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✓</span>
                        Rekod Jualan
                    </div>

                </div>

                <div class="mt-10">

                    <img
                        src="{{ asset('images/dashboard-preview.png') }}"
                        alt="Dashboard"
                        class="rounded-2xl shadow-xl border border-slate-700">

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->

        <div class="p-10 flex items-center">

            <div class="w-full max-w-md mx-auto">

                <div class="text-center mb-8">

                    <h2 class="text-4xl font-bold text-slate-800">
                        Daftar Akaun
                    </h2>

                    <p class="text-slate-500 mt-2">
                        Cipta akaun baharu
                    </p>

                </div>

                <form method="POST" action="{{ route('register') }}">

                    @csrf

                    <!-- NAMA -->

                    <div class="mb-4">

                        <label class="block mb-2 font-medium">
                            Nama Penuh
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        @error('name')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- EMAIL -->

                    <div class="mb-4">

                        <label class="block mb-2 font-medium">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        @error('email')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- PASSWORD -->

                    <div class="mb-4">

                        <label class="block mb-2 font-medium">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        @error('password')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- CONFIRM PASSWORD -->

                    <div class="mb-6">

                        <label class="block mb-2 font-medium">
                            Sahkan Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            required
                            class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    </div>

                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-semibold transition">

                        Daftar Akaun

                    </button>

                </form>

                <div class="text-center mt-6">

                    <p class="text-slate-600">

                        Sudah ada akaun?

                        <a href="{{ route('login') }}"
                           class="text-blue-600 font-semibold">

                            Log Masuk

                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection