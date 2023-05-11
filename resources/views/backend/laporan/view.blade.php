@extends('backend.layout.main-layout')

@section('title','Laporan')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pesanan Pelangan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Daftar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pesanan Pelanggan</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <form action="penjualan.php" method="POST">
                <div class="row form-group">
                    <div class="col-6"><label for="sumber"><b> Dari </b></label></div>
                    <div class="col-6"> <label for="nominal"><b> Sampai </b></label></div>
                    <div class="col-6"><input type="date" name="dari" class="form-control" id="exampleFormControlInput1"></div>
                    <div class="col-6"><input type="date" name="sampai" class="form-control" id="exampleFormControlInput1"></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-info" type="submit" name="cari">Cari</button>
                    <button class="btn btn-info" type="submit" name="lihat">Lihat Semua Data</button>
                    <button class="btn btn-info" type="submit" name="lihat">Download PDF</button>
                </div>
            </form>
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
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">No.</th>
                                <th scope="col" class="sort" data-sort="name">Produk</th>
                                <th scope="col" class="sort" data-sort="budget">Nama pemesan</th>
                                <th scope="col" class="sort" data-sort="status">Ukuran</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga Total</th>
                                <th scope="col">Alamat Kirim</th>
                                <th scope="col">Status Pemesanan</th>
                                <th scope="col">Status pembayaran</th>
                                <th scope="col">Tanggal pembayaran</th>
                                <th scope="col">Bukti pembayaran</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->

            </div>
        </div>
    </div>
    @endsection