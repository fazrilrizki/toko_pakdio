@extends('backend.layout.main-layout')

@section('title','Dashboard')

@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Pendapatan Keseluruhan</h5>
                                    <span class="h2 font-weight-bold mb-0">Rp. @money($hitungPendapatan)</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-active-40"></i>
                                    </div>

                                </div>

                            </div>
                            <a href="indexDataPesanan">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Pelanggan</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $hitungUser }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-chart-pie-35"></i>
                                    </div>
                                </div>
                            </div>
                            <a href="indexDataUsers">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Produk</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $hitungProduk }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                            <a href="indexDataProduk">Detail</a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Stock Tersedia</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $stock }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>
                            <a href="indexDataProduk">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Data Penjualan Terbaru</h3>
                        </div>
                        <div class="col text-right">
                            <a href="indexDataPesanan" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Nama User</th>
                                <th scope="col" class="sort" data-sort="name">Nama Produk</th>
                                <th scope="col" class="sort" data-sort="name">Jumlah Pesanan</th>
                                <th scope="col" class="sort" data-sort="budget">Total Harga</th>
                                <th scope="col" class="sort" data-sort="budget">Alamat Pengirim</th>
                                <th scope="col" class="sort" data-sort="budget">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesanan as $getPesanan)
                            <tr>
                                <td>{{ $getPesanan->user->name }}</td>
                                <td>{{ $getPesanan->product->product_name }}</td>
                                <td>{{ $getPesanan->jumlah_pembelian }}</td>
                                <td>Rp. {{ $getPesanan->total_harga }}</td>
                                <td>{{ $getPesanan->alamat_pembelian }}</td>
                                <td>{{ $getPesanan->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Data Product Stock</h3>
                        </div>
                        <div class="col text-right">
                            <a href="indexDataProduk" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $produk)
                            <tr>
                                <td>{{ $produk->product_name }}</td>
                                <td>{{ $produk->product_stock }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection