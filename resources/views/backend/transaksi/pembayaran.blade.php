@extends('backend.layout.main-layout')

@section('title','Data Transaksi Pesanan Pelanggan yang sudah Dibayar')

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
                    <h3 class="mb-3">Daftar Transaksi Pesanan Pelanggan yang Sudah Dibayar</h3>
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" action="indexDataJenisProduk" method="GET">
                        @csrf
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search Data Transaksi Pesanan Pelanggan" type="text" name="search">
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
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                            $no= 1; 
                            ?>
                            @foreach($pembayaran as $getpembayaran)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $getpembayaran->user->name }}</td>
                                <td>{{ $getpembayaran->product->product_name }}</td>
                                <td>{{ $getpembayaran->jumlah_pembelian }}</td>
                                <td>Rp. @money($getpembayaran->total_harga)</td>
                                <td>{{ $getpembayaran->alamat_pembelian }}</td>
                                <td>{{ $getpembayaran->status }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#modal-edit{{ $getpembayaran->id }}">Update</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @foreach($pembayaran as $updateStatus)
            <!-- modal update -->
            <div class="modal fade" id="modal-edit{{ $updateStatus->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-4">
                                        <small>Update Status Pesanan Barang</small>
                                    </div>
                                    <form role="form" method="post" action="updateStatus" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <input type="hidden" name="ambilidproduk" value="{{ $updateStatus->product->id }}">
                                            <input type="hidden" name="ambilqty" value="{{ $updateStatus->jumlah_pembelian }}">
                                            <input type="hidden" name="ambilid" value="{{ $updateStatus->id }}">
                                            <div class="input-group input-group-merge input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                </div>
                                                <select name="updateStatus" id="updateStatus" class="form-control">
                                                    <option value=""> --- Update Status Pesanan Barang ---</option>
                                                    <option value="Dikirim">DIKIRIM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary my-4" name="simpan">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

@endsection