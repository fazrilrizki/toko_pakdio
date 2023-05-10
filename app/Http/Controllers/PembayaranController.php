<?php

namespace App\Http\Controllers;

use App\Models\transaksiPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    //FRONT END
    public function indexDataPembayaran(){
        $pembayaran = transaksiPemesanan::where('status','Sudah Dibayar1');
        return view('backend.transaksi.pembayaran',["pembayaran" => $pembayaran]);
    }

    //BACK END
    public function pembayaranUser(){
        $pembayaranUserBelumDibayar = transaksiPemesanan::where('user_id',Auth::id())
                            ->where('status','Belum Dibayar')
                            ->get();
        $pembayaranUserSudahDibayar = transaksiPemesanan::where('user_id',Auth::id())
                                        ->where('status','Sudah Dibayar')
                                        ->get();
                        
        return view('frontend.pembayaran.view',[
            'pembayaran' => $pembayaranUserBelumDibayar,
            'sudahDibayar' => $pembayaranUserSudahDibayar
        ]);
    }
}
