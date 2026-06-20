<div class="min-h-screen bg-slate-100 flex items-center justify-center p-6">

    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden max-w-6xl w-full grid md:grid-cols-2">

        <!-- Preview Dashboard -->

        <div class="bg-slate-900 p-8 text-white">

            <h1 class="text-4xl font-bold mb-3">
                Sistem Pengurusan Kedai Makan
            </h1>

            <p class="text-slate-300 mb-6">
                Sistem POS, Pengurusan Menu, Sales dan Orders.
            </p>

            <img
                src="{{ asset('images/dashboard-preview.png') }}"
                class="rounded-2xl shadow-xl border border-slate-700"
            >

        </div>

        <!-- Login Form -->

        <div class="p-10 flex items-center">

            <div class="w-full">

                <h2 class="text-3xl font-bold mb-2">
                    Selamat Datang
                </h2>

                <p class="text-slate-500 mb-8">
                    Sila log masuk untuk meneruskan.
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">

                        <label class="block mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="w-full border rounded-xl px-4 py-3"
                        >

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="w-full border rounded-xl px-4 py-3"
                        >

                    </div>

                    <button
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold">

                        Login

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>