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

    public function order(Request $request)
    {
        if (Auth::check()) {
            return view('frontend.product.order');
        } else {
            return back()->with('orderFailed', '');
        }
    }
}
