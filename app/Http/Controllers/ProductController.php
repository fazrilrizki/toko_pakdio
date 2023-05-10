<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\transaksiPemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        // $product = Product::all();
        $product = Product::latest();

        //BELUM DITAMBAHKAN SEARCH DARI JENIS PRODUK
        return view('frontend.product.product', [
            "product" => $product->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    public function order(Request $request)
    {   
        $ambilIDProduct = $request->ambilidbarang;
        $product = Product::find($ambilIDProduct);
        if (Auth::check()) {
            return view('frontend.product.order',['product' => $product]);
        } else {
            return back()->with('orderFailed', '');
        }
    }

    public function actionTransaksi(Request $request){
        $request->validate([
            'namabarang' =>'required',
            'jumlah' => 'required',
            'hargat' => 'required',
            'alamat' => 'required'
        ]);

        $pesanan = new transaksiPemesanan();
        $pesanan->user_id = $request->ambilidpelanggan;
        $pesanan->product_id = $request->ambilidproduk;
        $pesanan->jumlah_pembelian = $request->jumlah;
        $pesanan->total_harga = $request->hargat;
        $pesanan->alamat_pembelian = $request->alamat;
        $pesanan->status = 'Belum Dibayar';
        $pesanan->save();

        return redirect('index');
    }
}
