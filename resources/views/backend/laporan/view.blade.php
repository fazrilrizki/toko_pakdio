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
            <form action="actionLaporan" method="GET">
                <div class="row form-group">
                    <div class="col-6"><label for="sumber"><b> Tanggal Laporan Harian </b></label></div>
                    <div class="col-12"><input type="date" name="dari" class="form-control" id="exampleFormControlInput1"></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-info" type="submit" value="cari" name="cari">Cari</button>
                    <button class="btn btn-info" type="submit" value="lihat" name="lihat">Lihat Semua Data</button>
                    <button class="btn btn-info" type="submit" value="laporanH" name="laporanH">Download Laporan Harian berdasarkan Tanggal yang Dipilih</button>
                    <button class="btn btn-info" type="submit" value="laporanB" name="laporanB">Download Laporan Bulan Ini</button>
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
                    @if(empty($ambilDari))
                    <h3 class="mb-0">Daftar Pesanan Pelanggan</h3>
                    @else
                    <h3>Daftar Penjualan pada Tanggal {{ $ambilDari }}</h3>
                    @endif
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
                            $no = 1; 
                            ?>
                            @foreach($pesananSearch as $getPesanan)
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
                <!-- Card footer -->

            </div>
        </div>
    </div>
    @endsection