@extends('frontend.layout.main-layout')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css" crossorigin="anonymous">



@section('title', 'Form Pemesanan')

@section('content')
<div class="container-fuild mt-5">
    <div class="row">
        <div class="col-md-4">
            <h1 class="mb-3">Form Pemesanan</h1>
            <form action="" method="POST">
                <input type="hidden" readonly="readonly" class="form-control" name="idt" value="">
                <input type="hidden" readonly="readonly" class="form-control" name="idpro" value=">">
                <input type="hidden" readonly="readonly" class="form-control" name="idpel" value="">
                <div class="form-group">
                    <label for="">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" onkeyup="myFunction() ">
                    <small class="form-text text-muted">Masukkan Jumlah Pembelian</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Harga Satuan</label>
                    <input type="text" class="form-control" name="hargas" id="hargas" onkeyup="myFunction() " value="" readonly="readonly">
                    <small class="form-text text-muted">Harga per satu Produk</small>
                </div>
                <div class="form-group">
                    <label for="">Harga Total</label>
                    <input type="text" readonly="readonly" class="form-control" name="hargat" id="hargat">
                    <small class="form-text text-muted">Harga Total</small>
                </div>
                <div class="form-group">
                    <label for="">Alamat Kirim</label>
                    <input type="text" class="form-control" name="alamatk">
                    <small class="form-text text-muted">Masukkan Alamat anda</small>
                </div>
                <script>
                    function myFunction() {
                        var hargas = document.getElementById("hargas").value;
                        var jumlah = document.getElementById("jumlah").value;
                        var hasil = jumlah * hargas;
                        document.getElementById("hargat").value = hasil;

                    }
                </script>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection