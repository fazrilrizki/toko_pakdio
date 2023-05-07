@extends('frontend.layout.main-layout')

@section('title', 'Home Guest')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2">
            <h1>Mari Berbelanja dengan <br> TokoPakDio</h1>
            <p style="font-family: sans-serif">Cintailah produk asli Indonesia <br>Original dan Sudah Berlabel Halal dari Majelis Ulama Indonesia(MUI).</p>
            <a href="" class="btn" onclick="read();">Baca Lebih</a>
        </div>
        <div class="col-2">
            <img src="img/icons/child.png">
        </div>
    </div>
</div>
<div class="testimonial">
    <div class="small-container">
        <h2 class="title">Our Ready Stock</h2>
        <div class="row">
            @foreach($product as $produk)
            <div class="col-3">
                <img src="../images/produk">
                <h4> </h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <p>Nama Mainan : {{ $produk["product_name"] }}</p>
                <p>Stock Barang : {{ $produk["product_stock"] }} </p>
                <p><b> Harga : Rp. {{ $produk["product_price"] }} </b></p>
                <p>Deskripsi Mainan : {{ $produk["product_description"] }} </p>
                @if (Auth::check())
                <a href="order" class="btn">Pesan Sekarang</a>
                @elseif (Auth::guest())
                <a href="registerCustomer" class="btn">Login Now!</a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection