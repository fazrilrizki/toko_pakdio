@extends('frontend.layout.main-layout')

@section('title', 'Produk')

@section('content')
<div class="offer">
    <div class="testimonial" id="produk">
        <div class="small-container">
            <h2 class="title">Our Product</h2>
            <form action="product" method="GET">
                @csrf
                <input class="input-field" type="text" name="search" placeholder="Search....">
                <button type="submit" class="btn">Search</button>
            </form>
            <br>
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
                    <a title="Show Data" data-toggle="modal" data-target="#modal_kecil{{ $produk["id"] }}" class="btn">Pesan Sekarang</a>
                    @elseif (Auth::guest())
                    <a href="registerCustomer" class="btn">Login Now!</a>
                    @endif
                </div>
                @endforeach
            </div>
            {{ $product->links() }}
        </div>

        @foreach($product as $modalProduk)
        <div class="modal backdrop fade" id="modal_kecil{{ $modalProduk->id }}" data-backdrop="false">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <!-- Ini adalah Bagian Body Modal -->
                    <div class="modal-body">
                        <form method="GET" action="formTransaksi">
                            @csrf
                            Apakah anda yakin memesan mainan {{ $modalProduk->product_name }} ?
                            <input type="hidden" name="ambilidbarang" value="{{ $modalProduk->id }}">
                    </div>
                    <!-- Ini adalah Bagian Footer Modal -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="simpan" id="simpan">Iya</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection