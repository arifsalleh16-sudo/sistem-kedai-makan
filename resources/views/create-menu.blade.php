<h1>Tambah Menu</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/menu">
    @csrf

    <label>Nama Menu:</label>
    <input type="text" name="nama">

    <br><br>

    <label>Harga:</label>
    <input type="number" step="0.01" name="harga">

    <br><br>

    <button type="submit">Tambah</button>
</form>

<label>Kategori</label>

<select name="category_id">

    @foreach($categories as $category)

        <option value="{{ $category->id }}">
            {{ $category->nama }}
        </option>

    @endforeach

</select>