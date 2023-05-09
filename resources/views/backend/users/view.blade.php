@extends('backend.layout.main-layout')

@section('title','Data User')

@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pelanggan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Daftar</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pelanggan</li>
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
                    <h3 class="mb-0">Daftar Pelanggan</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">No.</th>
                                <th scope="col" class="sort" data-sort="name">Nama</th>
                                <th scope="col" class="sort" data-sort="name">Email</th>
                                <th scope="col" class="sort" data-sort="budget">Username</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                            $no = 1;
                            ?>
                            @foreach($pelanggan as $getPelanggan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $getPelanggan->name }}</td>
                                <td>{{ $getPelanggan->email }}</td>
                                <td>{{ $getPelanggan->username }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="#" type="button" data-toggle="modal" data-target="#modal-edit{{ $getPelanggan->id }}">Update</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @foreach($pelanggan as $updatePelanggan)
            <!-- modal update -->
                <div class="modal fade" id="modal-edit{{ $updatePelanggan->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="card bg-secondary border-0 mb-0">
                                    <div class="card-body px-lg-5 py-lg-5">
                                        <div class="text-center text-muted mb-4">
                                            <small>Update Data Pelanggan</small>
                                        </div>
                                        <form role="form" method="post" action="updateDataUser" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                    </div>
                                                    <input type="hidden" name="ambilid" value="{{ $updatePelanggan->id }}">
                                                    <input class="form-control" placeholder="Nama Pelanggan" type="text" name="nama" value="{{ $updatePelanggan->name }}">
                                                </div>
                                            </div>  
                                            <div class="form-group mb-3">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                    </div>
                                                    <input class="form-control" placeholder="Email" type="text" name="email" value="{{ $updatePelanggan->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                                    </div>
                                                    <input type="hidden" name="idjenis" value="{{ $updatePelanggan->id }}">
                                                    <input class="form-control" placeholder="Username" type="text" name="username" value="{{ $updatePelanggan->username }}">
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