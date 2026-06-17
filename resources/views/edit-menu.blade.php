<h1>Edit Menu</h1>

<form method="POST" action="/menu/{{ $menu->id }}">
    @csrf
    @method('PUT')

    <label>Nama Menu:</label>
    <input
        type="text"
        name="nama"
        value="{{ $menu->nama }}"
    >

    <br><br>

    <label>Harga:</label>
    <input
        type="number"
        step="0.01"
        name="harga"
        value="{{ $menu->harga }}"
    >

    <label>Kategori:</label>
     <select name="category_id">

    @foreach($categories as $category)

        <option value="{{ $category->id }}" 
            {{ $category->nama }}
        </option>

    @endforeach

    </select>

    <br><br>

    <button type="submit">
        Kemaskini
    </button>
</form>