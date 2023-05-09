<?php

namespace App\Http\Controllers;

use App\Models\Product;
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

    public function order($id)
    {
        $product = Product::find($id);
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
            'price' => 'required'
        ]);

    }
}
