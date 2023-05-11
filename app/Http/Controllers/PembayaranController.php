<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\saldoUser;
use App\Models\transaksiPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    //FRONT END
    public function indexDataPembayaran(){
        $pembayaran = transaksiPemesanan::where('status','Sudah Dibayar')
                    ->orWhere('status', 'Dikirim')
                    ->get();
        return view('backend.transaksi.pembayaran',[
            "pembayaran" => $pembayaran
        ]);
    }

    public function updateDiterima(Request $request)
    {
        $pesanan = transaksiPemesanan::find($request->ambilid);
        $pesanan->status = 'Diterima';
        $pesanan->save();

        // return redirect()->back()->with('success', 'Status telah berhasil dirubah oleh anda menjadi Diterima!');
        return redirect()->back();
    }

    public function deletePesanan(Request $request)
    {
        $pesanan = transaksiPemesanan::find($request->ambilid);
        $pesanan->delete();

        // return redirect()->back()->with('success', 'Status telah berhasil dirubah oleh anda menjadi Diterima!');
        return redirect()->back();
    }

    public function checkSaldo(Request $request){
        //AMBIL SALDO
        $saldo = saldoUser::find(Auth::id());
        $ambilSaldo = $saldo->saldo_elektronik;

        // AMBIL TOTAL HARGA PEMESANAN
        $pembayaran = transaksiPemesanan::find($request->ambilid);
        $ambilTotalHarga = $pembayaran->total_harga;

        if ($ambilSaldo < $ambilTotalHarga)
        {
            // return redirect()->back()->with('pembayaranGagal', 'Saldo anda tidak cukup!');
            return redirect('pembayaran')->with('gagalBayar','Mohon maaf saldo anda tidak mencukupi!');
        }
        elseif($ambilSaldo > $ambilTotalHarga)
        {
            //UPDATE SALDO
            $updateSaldo = $ambilSaldo - $ambilTotalHarga;
            $saldo->saldo_elektronik = $updateSaldo;
            $saldo->save();

            //UPDATE STATUS MENJADI SUDAH DIBAYAR
            $pembayaran->status = 'Sudah Dibayar';
            $pembayaran->save();

            return redirect('pembayaran')->with('berhasilBayar','Selamat, anda berhasil membayar! Saldo anda akan dipotong!');

            // return redirect()->back()->with('pembayaranBerhasil', 'Anda berhasil membayar!');
        }
        
    }
    
    //BACK END
    public function pembayaranUser(){
        $pembayaranUserBelumDibayar = transaksiPemesanan::where('user_id',Auth::id())
                            ->where('status','Belum Dibayar')
                            ->get();
        $pembayaranUserSudahDibayar = transaksiPemesanan::where('user_id',Auth::id())
                                        ->where('status','Sudah Dibayar')
                                        ->orWhere('status', 'Dikirim')
                                        ->orWhere('status','Diterima')
                                        ->get();
                        
        return view('frontend.pembayaran.view',compact('pembayaranUserBelumDibayar', 'pembayaranUserSudahDibayar'));
    }

    public function updateStatus(Request $request)
    {
        $pesanan = transaksiPemesanan::find($request->ambilid);
        $pesanan->status = $request->updateStatus;
        $pesanan->save();

        if ($request->updateStatus == 'Dikirim'){
            $stockUpdate = Product::find($request->ambilidproduk);
            $ambilStockSekarang = $stockUpdate->product_stock;
            $stockSetelahPengiriman = $ambilStockSekarang - $request->ambilqty;
            $stockUpdate->product_stock = $stockSetelahPengiriman;
            $stockUpdate->save();
            return redirect()->back()->with('success', 'Data transaksi berhasil diupdate!');
        }else {
            dd('error!');
        }
        // return redirect()->back()->with('success', 'Data transaksi berhasil diupdate!');
    }

}
