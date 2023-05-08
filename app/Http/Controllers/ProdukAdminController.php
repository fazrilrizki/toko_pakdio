<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProdukAdminController extends Controller
{
    public function insertProduk(Request $request){
        $request->validate([
            'namaproduk' =>'required',
            'namajenis' => 'required',
            'stock' => 'required',
            'price' => 'required'
        ]);
        // $imageName = time().'.'.$request->gambar->extension();
        // $request->gambar->move(public_path('gambar'), $imageName); 
 
        $product =  new Product();
        $product->product_name = $request->namaproduk;
        $product->product_types_id = $request->namajenis;
        $product->product_stock = $request->stock;
        $product->product_price = $request->price;
        // $product->stock
        // $product->save();

        // return redirect('indexDataJenisProduk');
    }
}
