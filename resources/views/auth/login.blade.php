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
                    Sistem Pengurusan Kedai Makan berasaskan Laravel.
                </p>

                <div class="space-y-4">

                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✓</span>
                        Dashboard Jualan
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✓</span>
                        POS System
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✓</span>
                        Order Management
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✓</span>
                        Sales Report
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
                        Log Masuk
                    </h2>

                    <p class="text-slate-500 mt-2">
                        Selamat datang kembali
                    </p>

                </div>

                @if(session('status'))
                    <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-xl">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <!-- EMAIL -->

                    <div class="mb-5">

                        <label class="block mb-2 font-medium">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                        @error('email')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- PASSWORD -->

                    <div class="mb-5">

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

                    <!-- REMEMBER -->

                    <div class="flex items-center justify-between mb-6">

                        <label class="flex items-center gap-2">

                            <input
                                type="checkbox"
                                name="remember">

                            <span class="text-sm text-slate-600">
                                Ingat Saya
                            </span>

                        </label>

                        @if (Route::has('password.request'))

                            <a href="{{ route('password.request') }}"
                               class="text-blue-600 text-sm">

                                Lupa Password?

                            </a>

                        @endif

                    </div>

                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">

                        Log Masuk

                    </button>

                </form>

                <div class="text-center mt-6">

                    <p class="text-slate-600">

                        Belum ada akaun?

                        <a href="{{ route('register') }}"
                           class="text-blue-600 font-semibold">

                            Daftar Sekarang

                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection