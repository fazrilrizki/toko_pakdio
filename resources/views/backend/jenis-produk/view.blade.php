@extends('backend.layout.main-layout')

@section('title','Data Jenis Produk')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Jenis Produk</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Tidak Daftar Lagi</a></li>
                            <li class="breadcrumb-item"><a href="#">Tidak Daftar 1</a></li>
                            <li class="breadcrumb-item"><a href="#">Tidak Daftar 2</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Jenis Produk</li>
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
                    <h3 class="mb-3">Daftar Jenis Produk</h3>
                    <a class="btn btn-default mb-3" type="button" data-toggle="modal" data-target="#modal-form">Tambah Data</a>
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" action="indexDataJenisProduk" method="GET">
                        @csrf
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search Data Jenis Produk" type="text" name="search">
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
                                <th scope="col" class="sort" data-sort="name">Jenis Mainan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                            $no = 1;
                            ?>
                            @foreach($jenis as $getjenis)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $getjenis->types_name }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#modal-edit{{ $getjenis->id }}">Update</a>
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#modal-notification{{ $getjenis->id }}">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Tambah -->
            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-4">
                                        <small>Tambah Data Jenis Produk</small>
                                    </div>
                                    <form role="form" method="post" action="insertJenisProduk" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-merge input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Nama Jenis Produk" type="text" name="namajenis">
                                            </div>
                                            @error('namajenis')
                                            <p style="color: red;">
                                                {{ $message }}
                                            </p>
                                            @enderror
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

            @foreach($jenis as $updateJenis)
            <!-- modal update -->
            <div class="modal fade" id="modal-edit{{ $updateJenis->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-4">
                                        <small>Update Data Pegawai</small>
                                    </div>
                                    <form role="form" method="post" action="updateJenisProduk" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-merge input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                </div>
                                                <input type="hidden" name="idjenis" value="{{ $updateJenis->id }}">
                                                <input class="form-control" placeholder="Nama Jenis Produk" type="text" name="namajenis" value="{{ $updateJenis->types_name }}">
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

            @foreach($jenis as $getjenis2)
            <!-- modal delete -->
            <div class="modal fade" id="modal-notification{{ $getjenis2->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-danger">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="deleteJenisProduk" method="POST">
                                @csrf
                                <div class="py-3 text-center">
                                    <i class="ni ni-bell-55 ni-3x"></i>
                                    <input type="hidden" name="ambilid" value="{{ $getjenis2->id }}">
                                    <h4 class="heading mt-4">Apakah kamu yakin ingin menghapus data ini?</p>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <form  action="" method="POST"> -->
                            <button type="submit" class="btn btn-white">Iya</button>
                            <!-- </form> -->
                            <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tidak</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endsection