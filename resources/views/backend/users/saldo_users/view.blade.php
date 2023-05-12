@extends('backend.layout.main-layout')

@section('title','Data Saldo Akun')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Saldo Pelanggan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Daftar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Saldo Pelanggan</li>
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
                    <h3 class="mb-3">Daftar Saldo Pelanggan</h3>
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main" action="indexDataSaldoAkun" method="GET">
                        @csrf
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search Data Saldo Pelanggan" type="text" name="search">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">No.</th>
                                <th scope="col" class="sort" data-sort="name">Nama</th>
                                <th scope="col" class="sort" data-sort="name">Saldo</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                                $no = 1;
                            ?>
                            @foreach ($saldoUser as $getSaldo)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $getSaldo->user->name }}</td>
                                <td>Rp. @money($getSaldo->saldo_elektronik)</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#modal-edit{{ $getSaldo->id }}">Update</a>
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#modal-notification{{ $getSaldo->id }}">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @foreach($saldoUser as $deleteSaldo)
            <!-- modal delete -->
            <div class="modal fade" id="modal-notification{{ $deleteSaldo->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-danger">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="deleteSaldo" method="POST">
                                @csrf
                            <div class="py-3 text-center">
                                <i class="ni ni-bell-55 ni-3x"></i>
                                <input type="hidden" name="ambilidsaldo" value="{{ $deleteSaldo->id }}">
                                <h4 class="heading mt-4">Apakah kamu yakin ingin menghapus data ini?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <form  action="" method="POST"> -->
                            <button type="submit" class="btn btn-white">Iya</button>
                            <!-- </form> -->
                            <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Tidak</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

            @foreach($saldoUser as $updateSaldo)
            <!-- modal edit -->
            <div class="modal fade" id="modal-edit{{ $updateSaldo->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">

                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card bg-secondary border-0 mb-0">
                                <div class="card-body px-lg-5 py-lg-5">
                                    <div class="text-center text-muted mb-4">
                                        <small>Update Data Saldo</small>
                                    </div>
                                    <form role="form" method="POST" action="updateSaldo" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="idsaldo" value="{{ $updateSaldo->id }}">
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-merge input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                </div>
                                                <input class="form-control" value="{{ $updateSaldo->user->name }}" type="text" name="nama" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-merge input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                </div>
                                                <input class="form-control" value="{{ $updateSaldo->saldo_elektronik }}" type="text" name="saldo">
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