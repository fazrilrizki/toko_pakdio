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
                    <h3 class="mb-0">Daftar Transaksi Pesanan Pelanggan</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">No.</th>
                                <th scope="col" class="sort" data-sort="name">Nama Produk</th>
                                <th scope="col" class="sort" data-sort="name">Jumlah Pesanan</th>
                                <th scope="col" class="sort" data-sort="budget">Total Harga</th>
                                <th scope="col" class="sort" data-sort="budget">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($pesanan as $getPesanan)
                            <tr>
                                <td>1</td>
                                <td>{{ $getPesanan->product_id }}</td>
                                <td>{{ $getPesanan->jumlah_pembelian }}</td>
                                <td>{{ $getPesanan->total_harga }}</td>
                                <td>{{ $getPesanan->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection