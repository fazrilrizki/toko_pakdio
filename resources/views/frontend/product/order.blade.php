@extends('frontend.layout.main-layout')
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css" crossorigin="anonymous">



@section('title', 'Form Pemesanan')

@section('content')
<div class="container-fuild mt-5">
    <div class="row">
        <div class="col-md-4">
            <h1 class="mb-3">Form Pemesanan</h1>
            <form action="insertTransaksi" method="POST">
                @csrf   
                <input type="hidden" name="ambilstocksekarang" value="{{ $product->product_stock }}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" class="form-control" name="namabarang" id="namabarang" value="{{ $product->product_name }}" readonly="readonly">
                    <small class="form-text text-muted">Harga per satu Produk</small>
                </div>
                <input type="hidden" name="ambilidpelanggan" value="{{ Auth::id() }}">
                <input type="hidden" name="ambilidproduk" value="{{ $product->id }}">
                <div class="form-group">
                    <label for="">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" onkeyup="myFunction() ">
                    <small class="form-text text-muted">Masukkan Jumlah Pembelian</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Harga Satuan</label>
                    <input type="text" class="form-control" name="hargas" id="hargas" onkeyup="myFunction() " value="{{ $product->product_price }}" readonly="readonly">
                    <small class="form-text text-muted">Harga per satu Produk</small>
                </div>
                <div class="form-group">
                    <label for="">Harga Total</label>
                    <input type="text" readonly="readonly" class="form-control" name="hargat" id="hargat">
                    <small class="form-text text-muted">Harga Total</small>
                </div>
                <div class="form-group">
                    <label for="">Alamat Kirim</label>
                    <input type="text" class="form-control" name="alamat">
                    <small class="form-text text-muted">Masukkan Alamat anda</small>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    function myFunction() {
        var hargas = document.getElementById("hargas").value;
        var jumlah = document.getElementById("jumlah").value;
        var hasil = jumlah * hargas;
        document.getElementById("hargat").value = hasil;

    }
</script>
@endsection