<?php

namespace App\Http\Controllers;

use App\Models\transaksiPemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function actionLaporan(Request $request)
    {
        if (session()->has('getUsername')) {
            $ambilDari = $request->dari;
            $valueCari = $request->cari;
            $valueLihat = $request->lihat;
            $valueDownloadHari = $request->laporanH;
            $valueDownloadBulan = $request->laporanB;

            if($valueCari){
                $pesanan = transaksiPemesanan::whereDate('created_at', $ambilDari)
                            ->orWhere('status','Sudah Dibayar')
                            ->where('status','Dikirim')
                            ->where('status','Diterima')
                            ->get();
            }else if($valueLihat){
                $pesanan = transaksiPemesanan::all();
            }else if($valueDownloadHari){
                $cetakLaporan = transaksiPemesanan::whereDate('created_at', $ambilDari)
                                ->orWhere('status','Sudah Dibayar')
                                ->where('status','Dikirim')
                                ->where('status','Diterima')
                                ->get();
                $totalPenjualanH = transaksiPemesanan::whereDate('created_at', $ambilDari)
                                    ->orWhere('status','Sudah Dibayar')
                                    ->where('status','Dikirim')
                                    ->where('status','Diterima')
                                    ->sum('total_harga');
                $no = 1;
                return view('backend.laporan.cetak-laporan',[
                    "cetakLaporan" => $cetakLaporan,
                    "no" => $no,
                    "totalPenjualanH" => $totalPenjualanH,
                    "ambilTanggal" => $ambilDari
                ]);
            }else if($valueDownloadBulan){
                $currentMonth = Carbon::now();
                $monthName = $currentMonth->format('F');
                $cetakLaporanB = transaksiPemesanan::whereRaw('MONTH(created_at) = ?',[$currentMonth])
                                ->Where('status','Sudah Dibayar')
                                ->orWhere('status','Dikirim')
                                ->orWhere('status','Diterima')
                                ->get();
                $totalPenjualanB = transaksiPemesanan::whereRaw('MONTH(created_at) = ?',[$currentMonth])
                                ->Where('status','Sudah Dibayar')
                                ->orWhere('status','Dikirim')
                                ->orWhere('status','Diterima')
                                ->sum('total_harga');
                $no = 1;
                return view('backend.laporan.cetak-laporan-bulan',[
                    "cetakLaporanB" => $cetakLaporanB,
                    "no" => $no,
                    "totalPenjualanB" => $totalPenjualanB,
                    "monthName" => $monthName
                ]);
            }
            else{
                $pesanan = transaksiPemesanan::all();
            }

            return view('backend.laporan.view',compact('ambilDari'), [
                "pesananSearch" => $pesanan,
            ]);
    }
    return redirect('loginAdmin');
    }
}
