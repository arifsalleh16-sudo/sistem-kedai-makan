<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1 class="mb-4">
        Dashboard Kedai Makan
    </h1>

    <a href="/menu" class="btn btn-primary mb-3">
        Pergi ke Menu
    </a>

    <a href="/sales" class="btn btn-primary mb-3">
        Pergi ke Sales
    </a>

    <div class="row">

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Jumlah Menu</h5>

                    <h2>{{ $jumlahMenu }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Jumlah Pengguna</h5>

                    <h2>{{ $jumlahUser }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Jumlah Menu Makanan</h5>

                    <h2>{{ $jumlahMenuMakanan }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Jumlah Menu Minuman</h5>

                    <h2>{{ $jumlahMenuMinuman }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Jumlah Menu Dessert</h5>

                    <h2>{{ $jumlahMenuDessert }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Menu Makanan Paling Mahal</h5>

                    <h2>{{ $menuMakananPalingMahal->nama}}</h2>

                </div>

            </div>

        </div>

         <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Menu Makanan Paling Murah</h5>

                    <h2>{{ $menuMakananPalingMurah->nama }}</h2>

                </div>

            </div>
        </div>
            <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Total Nilai Semua Menu</h5>

                    <h2>RM {{ number_format($jumlahNilaiSemuaMenu, 0, ',', '.') }}</h2>

                </div>
            </div>
              
        </div>
        <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Jumlah Pendapatan Kesuluruhan</h5>

                    <h2>RM {{ number_format($jumlahSales, 0, ',', '.') }}</h2>

                </div>
            </div>
    </div>
    <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Jumlah Item Terjual</h5>

                    <h2>{{ $jumlahItemTerjual }}</h2>

                </div>
            </div>
    </div>
    <div class="col-md-4">

            <div class="card">

                <div class="card-body">

                    <h5>Menu Paling Laris</h5>

                    <h2>{{ $menuPalingLaris->menu->nama }}</h2>
                    <p>{{ $menuPalingLaris->jumlah }} Unit</p>

                </div>
            </div>
    </div>


</div>





<br> 
</div>

</div>

</body>
</html>