<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<div class="container mt-5">

    <h1>Menu Hari Ini</h1>

    <a href="/menu/create" class="btn btn-success mb-3">
        Tambah Menu
    </a>

    <form method="GET" action="/menu" class="mb-3">

    <div class="row">

        <div class="col-md-4">

            <input
                type="text"
                 name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Cari menu..."
>

        </div>

        <div class="col-md-2">

            <button class="btn btn-primary">
                Cari
            </button>

        </div>

    </div>

</form>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Tindakan</th>
            </tr>
        </thead>

        <tbody>

        @foreach($menus as $menu)

            <tr>

                <td>{{ $menu->id }}</td>

                <td>{{ $menu->nama }}</td>

                <td>RM {{ number_format($menu->harga,2) }}</td>

                <td>{{ $menu->kategori }}</td>

                <td>

                    <a
                        href="/menu/{{ $menu->id }}/edit"
                        class="btn btn-primary btn-sm"
                    >
                        Edit
                    </a>

                    <form
                        action="/menu/{{ $menu->id }}"
                        method="POST"
                        style="display:inline;"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            type="submit"
                            onclick="return confirm('Padam menu ini?')"
                        >
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>