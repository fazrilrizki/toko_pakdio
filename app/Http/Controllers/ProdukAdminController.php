<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductTypesModel;
use Illuminate\Http\Request;

class ProdukAdminController extends Controller
{
    public function indexDataProduk(){
        $product = Product::all();
        $jenis_produk = ProductTypesModel::all();
        return view('backend.product.view',[
            "product" => $product,
            "jenis_produk" => $jenis_produk
        ]);
    }
    public function insertProduk(Request $request){

        $request->validate([
            'namaproduk' =>'required',
            'jenis_produk' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'deskripsi' => 'required'
        ]);
        $name = $request->file('image')->getClientOriginalName();

        $product = new Product();
        $product->product_name = $request->namaproduk;
        $product->product_types_id = $request->jenis_produk;
        $product->product_stock = $request->stock;
        $product->product_price = $request->price;
        $product->product_photo = $name;
        $product->product_description = $request->deskripsi;
        $product->save();

        return redirect('indexDataProduk');
    }
}
