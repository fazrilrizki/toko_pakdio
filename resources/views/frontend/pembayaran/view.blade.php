@extends('frontend.layout.main-layout')

@section('title','Pembayaran')

@section('content')
<div class="testimonial">
    <div class="small-container">
        <h2 class="title">Pesanan Yang belum di bayar</h2>
        <div class="row">
                @foreach($pembayaran as $getPembayaranUser)
                <div class="col-3">
                    <input type="checkbox" name="pilihan{{ $getPembayaranUser->id }}" value="">
                    <img src="img/{{ $pembayaran->product->product_photo }}">
                    <label> ID Transaksi : {{ $getPembayaranUser->id }} </label>
                        <p>Harga total : Rp. {{ $getPembayaranUser->total_harga }}</p>
                </div>
                @endforeach
        </div>

        <!-- batas pembayaran -->
        <h2 class="title">Pesanan Yang Sudah di bayar</h2>
        <div class="row">
            @foreach($sudahDibayar as $getsudahDibayar)
            <div class="col-3">
                <label>ID Transaksi : {{ $getsudahDibayar->id }}</label>
                    <img src="img/{{ $getSudahDibayar->product->product_photo }}">
                    <h4></h4>
                    <p>Status Pesanan : {{ $getsudahDibayar->status }}<b></b></p>
                    <p>
                <div class="form-group">
                    <label class="btn"></label>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!--js for menu-->
<script type="text/javascript">
    var menuitems = document.getElementById("menuitems");
    menuitems.style.maxHeight = "0px";

    function menutoggle() {
        if (menuitems.style.maxHeight == "0px") {
            menuitems.style.maxHeight = "200px";
        } else {
            menuitems.style.maxHeight = "0px";
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@endsection