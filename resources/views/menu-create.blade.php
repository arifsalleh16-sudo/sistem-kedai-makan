<h1>Tambah Menu</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/menu/store">

    @csrf

    <p>Nama Menu</p>
    <input type="text" name="nama">

    <p>Harga</p>
    <input type="text" name="harga">

    <p>Kategori</p>
    <input type="text" name="kategori">

    <br><br>

    <button type="submit">
        Tambah Menu
    </button>

</form>