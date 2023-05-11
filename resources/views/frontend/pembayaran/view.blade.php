@extends('frontend.layout.main-layout')

@section('title','Pembayaran')

@section('content')
<div class="testimonial">
    <div class="small-container">
        <h2 class="title">Pesanan Yang belum di bayar</h2>
        <div class="row">
                @forelse($pembayaranUserBelumDibayar as $getPembayaranUser)
                <div class="col-3">
                    <input type="checkbox" name="pilihan{{ $getPembayaranUser->id }}" value="">
                    <img src="img/hotwheels.png">
                    <label> ID Transaksi : {{ $getPembayaranUser->id }} </label>
                        <p>Harga total : Rp. {{ $getPembayaranUser->total_harga }}</p>
                    <a title="Show Data" data-toggle="modal" data-target="#modal_kecil{{ $getPembayaranUser->id }}" class="btn">Bayar</a>
                    <a title="Show Data" data-toggle="modal" data-target="#modal_delete{{ $getPembayaranUser->id }}" class="btn">Batalkan Pesanan</a>
                </div>
                @empty
                <label> ....NO DATA...... </label>
                @endforelse
        </div>

        <!-- batas pembayaran -->
        <h2 class="title">Pesanan Yang Sudah di bayar</h2>
        <div class="row">
            @forelse($pembayaranUserSudahDibayar as $getsudahDibayar)
            <div class="col-3">
                <label>ID Transaksi : {{ $getsudahDibayar->id }}</label>
                    <img src="img/hotwheels.png">
                    <h4></h4>
                    <p>Status Pesanan : <b>Sudah Dibayar</b></p>
                    <div class="form-group">
                        @if($getsudahDibayar->status == 'Sudah Dibayar')
                        <label class="btn">{{ $getsudahDibayar->status }}</label>
                        @elseif($getsudahDibayar->status == 'Dikirim')
                        <button class="btn" data-toggle="modal" data-target="#modal_diterima{{ $getsudahDibayar->id }}">{{ $getsudahDibayar->status }}</button>
                        @else
                        <label class="btn">{{ $getsudahDibayar->status }}</label> 
                        @endif
                    </div>
            </div>
            @empty
            <label> ....NO DATA...... </label>
            @endforelse
        </div>
    </div>
</div>

<!-- Modal bayar Transaksi -->
@foreach($pembayaranUserBelumDibayar as $modalPembayaran)
<div class="modal backdrop fade" id="modal_kecil{{ $modalPembayaran->id }}" data-backdrop="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Ini adalah Bagian Body Modal -->
            <div class="modal-body">
                <form method="GET" action="checkSaldo">
                    @csrf
                    Apakah anda yakin akan membayar Transaksi : {{ $modalPembayaran->id }} ?
                    <input type="hidden" name="ambilid" value="{{ $modalPembayaran->id }}">
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

<!-- Modal Delete -->
@foreach($pembayaranUserBelumDibayar as $modalPembayaran)
<div class="modal backdrop fade" id="modal_delete{{ $modalPembayaran->id }}" data-backdrop="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Ini adalah Bagian Body Modal -->
            <div class="modal-body">
                <form method="GET" action="deletePesanan">
                    @csrf
                    Apakah anda yakin akan membatalkan pesanan dengan ID Transaksi : {{ $modalPembayaran->id }} ?
                    <input type="hidden" name="ambilid" value="{{ $modalPembayaran->id }}">
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

@foreach($pembayaranUserSudahDibayar as $modalDiterima)
<div class="modal backdrop fade" id="modal_diterima{{ $modalDiterima->id }}" data-backdrop="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Ini adalah Bagian Body Modal -->
            <div class="modal-body">
                <form method="POST" action="updateDiterima">
                    @csrf
                    Apakah barang anda sudah anda terima ?
                    <input type="hidden" name="ambilid" value="{{ $modalDiterima->id }}">
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


<div class="modal backdrop fade" id="modal_diterima" data-backdrop="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Ini adalah Bagian Body Modal -->
            @if(session()->has('berhasilBayar'))
            <div class="modal-body">
                    {{ session('berhasilBayar') }}
            </div>
            @endif
            <!-- Ini adalah Bagian Footer Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal backdrop fade" id="gagal_pembayaran" data-backdrop="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Ini adalah Bagian Body Modal -->
            @if(session()->has('gagalBayar'))
            <div class="modal-body">
                    {{ session('gagalBayar') }}
            </div>
            @endif
            <!-- Ini adalah Bagian Footer Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal backdrop fade" id="berhasil_pesan" data-backdrop="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <!-- Ini adalah Bagian Body Modal -->
            @if(session()->has('berhasilPesan'))
            <div class="modal-body">
                    {{ session('berhasilPesan') }}
            </div>
            @endif
            <!-- Ini adalah Bagian Footer Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
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
@if (session()->has('berhasilBayar'))
    <script>
        $('#modal_diterima').modal('toggle');
    </script>
@elseif (session()->has('gagalBayar'))
    <script>
            $('#gagal_pembayaran').modal('toggle');
    </script>
@elseif (session()->has('berhasilPesan'))
    <script>
        $('#berhasil_pesan').modal('toggle');
    </script>
@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@endsection