<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
use App\Models\ProductTypesModel;
use App\Models\transaksiPemesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function formLogin(){
        // if (session()->has('getUsername')) {
        //     return redirect('dashboard');
        // }
        return view('backend.login.login');
    }

    public function dashboard(){
        // if (session()->has('getUsername')) {
            
        // }
        return view('backend.home.index');
    }

    public function indexDataJenisProduk(){
        $jenis_produk = ProductTypesModel::all();
        // $no = $jenis_produk->first();
        return view('backend.jenis-produk.view', ["jenis" => $jenis_produk]);
    }

    public function indexDataProduk(){
        $product = Product::all();
        $jenis_produk = ProductTypesModel::all();
        return view('backend.product.view',[
            "product" => $product,
            "jenis_produk" => $jenis_produk
        ]);
    }

    public function indexDataUsers(){
        $pelanggan = User::all();
        return view('backend.users.view',["pelanggan" => $pelanggan]);
    }

    public function indexTransaksiPesanan(){
        $pesanan = transaksiPemesanan::all();
        return view('backend.transaksi.view',["pesanan" => $pesanan]);
    }
    public function actionLogin(Request $request){

        // dd(request('username'));
        $checkingInput = $request->validate([
            'username' => 'required|max:11|min:3',
            'password' => 'required|max:11',
        ]);

        $ambilUsername = $checkingInput['username'];
        $ambilPassword = $checkingInput['password'];

        $admin = Admin::all();
        $checkingAdmin = $admin->where('username', $ambilUsername)->where('password', $ambilPassword);
        $ambilCount = $checkingAdmin->count();


        if ($ambilCount == 1) {
            // $request->session()->put('getUsername', $checkingInput['username']);
            return redirect('dashboard');
        } else {
            dd('gagal login!');
        }
    }

    public function actionLogout(){
        // if (session()->has('getUsername')) {
        //     session()->pull('getUsername');
        // }
        return redirect('loginAdmin');
    }
}
