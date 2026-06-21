@extends('layouts.guest')

@section('content')

<div class="min-h-screen bg-slate-100 flex items-center justify-center p-6">

    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden max-w-6xl w-full grid md:grid-cols-2">

        <!-- LEFT SIDE -->

        <div class="bg-slate-900 text-white p-10 flex flex-col justify-center">

            <div>

                <h1 class="text-5xl font-bold mb-4">
                    🔐 Reset Password
                </h1>

                <p class="text-slate-300 text-lg mb-8">
                    Jangan risau. Masukkan email anda dan kami akan menghantar pautan untuk menetapkan semula password.
                </p>

                <div class="space-y-4">

                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✓</span>
                        Sistem POS
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✓</span>
                        Pengurusan Menu
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✓</span>
                        Order Management
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="text-green-400">✓</span>
                        Dashboard Analitik
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
                        Lupa Password
                    </h2>

                    <p class="text-slate-500 mt-2">
                        Masukkan email untuk menerima pautan reset password
                    </p>

                </div>

                @if (session('status'))
                    <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-xl">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">

                    @csrf

                    <div class="mb-6">

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

                    <button
                        type="submit"
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-semibold transition">

                        Hantar Pautan Reset Password

                    </button>

                </form>

                <div class="text-center mt-6">

                    <a href="{{ route('login') }}"
                       class="text-blue-600 font-semibold">

                        ← Kembali ke Login

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection