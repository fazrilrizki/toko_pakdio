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
        $hitungUser = User::count();
        $hitungProduk = Product::count();
        $hitungPendapatan = transaksiPemesanan::where('status','Sudah Dibayar')
                            ->orWhere('status','Dikirim')
                            ->orWhere('status','Diterima')
                            ->sum('total_harga');
        $pesanan = transaksiPemesanan::latest();
        $product = Product::latest();
        return view('backend.home.index',compact('hitungUser', 'hitungProduk','hitungPendapatan'), [
            "pesanan" => $pesanan->paginate(3),
            "product" => $product->paginate(5)
        ]);
    }

    public function indexDataJenisProduk(){
        $jenis_produk = ProductTypesModel::latest();
        // $no = $jenis_produk->first();
        return view('backend.jenis-produk.view', [
            "jenis" =>  $jenis_produk->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    public function indexDataUsers(){
        $pelanggan = User::latest();
        return view('backend.users.view',[
            "pelanggan" => $pelanggan->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    public function updateDataUser(Request $request){
        $request->validate([
            'nama' =>'required',
            'email' =>'required',
            'username' =>'required'
        ]);
        $user = User::find($request->ambilid);
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->save();

        return redirect('indexDataUsers');
    }

    public function indexTransaksiPesanan(){
        $pesanan = transaksiPemesanan::latest();
        return view('backend.transaksi.view',[
            "pesanan" => $pesanan->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
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
            return back()->with('loginError', 'Gagal Login, ulangi kembali!');
        }
    }

    public function actionLogout(){
        // if (session()->has('getUsername')) {
        //     session()->pull('getUsername');
        // }
        return redirect('loginAdmin');
    }
}
