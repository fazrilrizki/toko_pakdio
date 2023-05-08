@extends('backend.layout.main-layout')

@section('title','Data Produk')

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
                        
                                        <!-- modal delete -->
                                        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                <div class="modal-content bg-gradient-danger">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"></span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="py-3 text-center">
                                                            <i class="ni ni-bell-55 ni-3x"></i>
                                                            <h4 class="heading mt-4">Apakah kamu yakin ingin menghapus data ini?</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- <form  action="" method="POST"> -->
                                                        <a href="hapuspegawai.php?id=" class="btn btn-white">Iya</a>
                                                        <!-- </form> -->
                                                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tidak</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal edit -->
                                        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
                                            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">

                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="card bg-secondary border-0 mb-0">

                                                            <div class="card-body px-lg-5 py-lg-5">
                                                                <div class="text-center text-muted mb-4">
                                                                    <small>Update Data Pegawai</small>
                                                                </div>

                                                                <form role="form" method="post" action="editpegawai.php" enctype="multipart/form-data">



                                                                    <div class="form-group mb-3">
                                                                        <div class="input-group input-group-merge input-group-alternative">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                                            </div>
                                                                            <input class="form-control" value="" type="text" name="nama">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <div class="input-group input-group-merge input-group-alternative">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                                            </div>
                                                                            <input class="form-control" value="" type="text" name="alamat">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <div class="input-group input-group-merge input-group-alternative">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                                            </div>
                                                                            <select name="jabatan" id="jabatan" class="form-control">
                                                                        
                                                                                <option value="Jabatan"> --- Pilih Jabatan ---</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <div class="input-group input-group-merge input-group-alternative">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                                            </div>
                                                                            <input class="form-control" value="" type="text" name="telp">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <div class="input-group input-group-merge input-group-alternative">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                                            </div>
                                                                            <input class="form-control" value="" type="text" name="user">
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <div class="input-group input-group-merge input-group-alternative">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                                            </div>
                                                                            <input class="form-control" value="" type="text" name="pass">
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

                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
@endsection