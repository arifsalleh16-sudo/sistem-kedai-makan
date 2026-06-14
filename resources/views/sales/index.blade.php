<!DOCTYPE html>
<html>
<head>
    <title>Sales</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>



<div class="container mt-5">

    <h1>Rekod Jualan</h1>

    <a href="/sales/create" class="btn btn-success mb-3">
        Rekod Jualan Baru
    </a>

    <form method="GET" action="/sales" class="mb-3">

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
                <th>Kuantiti</th>
                <th>Tarikh</th>
                <th>Tindakan</th>
            </tr>
        </thead>

        <tbody>

        @foreach($sales as $sale)

            <tr>

                <td>{{ $sale->id }}</td>

                <td>{{ $sale->menu->nama }}</td>

                <td>RM {{ number_format($sale->menu->harga,2) }}</td>

                <td>{{ $sale->menu->kategori }}</td>

                <td>{{ $sale->kuantiti }}</td>

                <td>{{ $sale->created_at->format('d M Y, H:i') }}</td>

                <td>

                    <a
                        href="/sales/{{ $sale->id }}/edit"
                        class="btn btn-primary btn-sm"
                    >
                        Edit
                    </a>

                    <form
                        action="/sales/{{ $sale->id }}"
                        method="POST"
                        style="display:inline;"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            type="submit"
                            onclick="return confirm('Padam jualan ini?')"
                        >
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>Tarikh</th>
                <th>Jumlah Jualan Hari Ini</th>
                <th>Jumlah Item Terjual Hari Ini</th>
                <th>Jumlah Jualan</th>
            </tr>
        </thead>

        <tbody>
        @foreach($salesByDate as $tarikh => $sales)

    <tr>
             <td>{{ \Carbon\Carbon::parse($tarikh)->format('d M Y') }}</td>

            <td>{{ $sales->count() }}</td>

            <td>{{ $sales->sum('kuantiti') }}</td>

            <td>RM {{number_format($sales->sum(function($sale) {return $sale->menu->harga * $sale->kuantiti;}),2)}}</td>
    </tr>
        @endforeach
        </tbody>

    </table>

</div>

</body>
</html>