<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
}
