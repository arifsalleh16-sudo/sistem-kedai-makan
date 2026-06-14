<h1>Tambah Jualan</h1>

<form method="POST" action="/sales">
    @csrf

    <label>Pilih Menu</label>

    <select name="menu_id">

        @foreach($menus as $menu)

            <option value="{{ $menu->id }}">
                {{ $menu->nama }}
            </option>

        @endforeach

    </select>

    <br><br>

    <label>Kuantiti</label>

    <input
        type="number"
        name="kuantiti"
        value="1"
    >

    <br><br>

    <button>
        Simpan
    </button>

</form>