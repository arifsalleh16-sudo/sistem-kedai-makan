@extends('layouts.guest')

@section('content')

<div class="min-h-screen bg-slate-100 flex items-center justify-center p-6">

    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden max-w-6xl w-full grid md:grid-cols-2">

        <!-- LEFT SIDE -->

        <div class="bg-slate-900 text-white p-10 flex flex-col justify-center">

            <div>

                <h1 class="text-5xl font-bold mb-4">
                    📧 Verify Email
                </h1>

                <p class="text-slate-300 text-lg mb-8">
                    Sahkan alamat email anda untuk mengaktifkan akaun dan menggunakan sistem sepenuhnya.
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
                        Sahkan Email
                    </h2>

                    <p class="text-slate-500 mt-2">
                        Kami telah menghantar pautan pengesahan ke email anda.
                    </p>

                </div>

                @if (session('status') == 'verification-link-sent')

                    <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl">

                        Pautan pengesahan baharu telah dihantar ke email anda.

                    </div>

                @endif

                <div class="bg-slate-50 border rounded-2xl p-5 mb-6">

                    <p class="text-slate-600">

                        Sebelum meneruskan, sila semak email anda dan klik pautan pengesahan yang telah dihantar.

                    </p>

                </div>

                <!-- Resend Verification -->

                <form method="POST"
                      action="{{ route('verification.send') }}">

                    @csrf

                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">

                        Hantar Semula Email Pengesahan

                    </button>

                </form>

                <!-- Logout -->

                <form method="POST"
                      action="{{ route('logout') }}"
                      class="mt-4">

                    @csrf

                    <button
                        type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-xl font-semibold transition">

                        Log Keluar

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection