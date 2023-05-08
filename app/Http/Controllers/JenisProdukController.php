<?php

namespace App\Http\Controllers;

use App\Models\ProductTypesModel;
use Illuminate\Http\Request;

class JenisProdukController extends Controller
{
    // public function indexDataJenisProduk(){
    //     $jenis_produk = ProductTypesModel::all();
    //     return view('backend.jenis-produk.view',["jenis" => $jenis_produk]);
    // }
    public function insertJenisProduk(Request $request){
        $request->validate([
            'namajenis' =>'required'
        ]);
        $jenis_produk = new ProductTypesModel();
        $jenis_produk->types_name = $request->namajenis;
        $jenis_produk->save();

        return redirect('indexDataJenisProduk');
    }

    // public function updateJenisProduk(Request $request){
    //     $request->validate([
    //         'namajenis' =>'required'
    //     ]);
    //     $jenis_produk = new ProductTypesModel();
    //     $jenis_produk->types_name = $request->namajenis;
    //     $jenis_produk->save();

    //     return redirect('indexDataJenisProduk');
    // }

    public function deleteJenisProduk(Request $request){
        $ambilIDJenis = $request->ambilid;
        ProductTypesModel::where('id', $ambilIDJenis)->delete();

        return redirect('indexDataJenisProduk');
    }
}
