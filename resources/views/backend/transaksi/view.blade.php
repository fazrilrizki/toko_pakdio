@extends('backend.layout.main-layout')

@section('title','Data Transaksi Pesanan')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Transaksi Pesanan Pelanggan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Daftar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaksi Pesanan Pelanggan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-3">Daftar Transaksi Pesanan Pelanggan</h3>
                     <!-- Search form -->
                     <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" action="indexDataPesanan" method="GET">
                        @csrf
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search Data Transaksi Pesanan" type="text" name="search">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </form>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">No.</th>
                                <th scope="col" class="sort" data-sort="name">Nama User</th>
                                <th scope="col" class="sort" data-sort="name">Nama Produk</th>
                                <th scope="col" class="sort" data-sort="name">Jumlah Pesanan</th>
                                <th scope="col" class="sort" data-sort="budget">Total Harga</th>
                                <th scope="col" class="sort" data-sort="budget">Alamat Pengirim</th>
                                <th scope="col" class="sort" data-sort="budget">Status</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                            $no= 1; 
                            ?>
                            @foreach($pesanan as $getPesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $getPesanan->user->name }}</td>
                                <td>{{ $getPesanan->product->product_name }}</td>
                                <td>{{ $getPesanan->jumlah_pembelian }}</td>
                                <td>Rp. @money($getPesanan->total_harga)</td>
                                <td>{{ $getPesanan->alamat_pembelian }}</td>
                                <td>{{ $getPesanan->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection