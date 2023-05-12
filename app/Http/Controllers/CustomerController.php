<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\saldoUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class CustomerController extends Controller
{
    // public function formLoginCustomer(){
    //     return view('frontend.register.login');
    // }

    public function formRegisterCustomer()
    {
        return view('frontend.register.register');
    }

    public function debug()
    {
        return view('frontend.register.debug');
    }

    public function indexCustomer()
    {
        $product = Product::latest();
        return view('frontend.home.home', ["product" => $product->paginate(10)->withQueryString()]);
    }

    public function homeCustomer()
    {
        $product = Product::latest();
        return view('frontend.home.guest', ["product" => $product->paginate(10)->withQueryString()]);
    }

    public function about()
    {
        return view('frontend.home.about');
    }

    public function account(){
        return view('frontend.account.view');
    }

    public function actionRegisterCustomer(Request $request)
    {
        // dd($request->all());
            $request->validate([
                'nama' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required|unique:users',
                'password' => 'required',
            ]);

            $user = new User();
            $user->name = $request->nama;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            $getUserID = $user->id;

            $saldo_user = new saldoUser();
            $saldo_user->user_id = $getUserID;
            $saldo_user->saldo_elektronik = 69;
            $saldo_user->save();

            return redirect('registerCustomer')->with('registerSuccess', 'Registrasi Berhasil!');
    }

    public function authenticate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $request->session()->regenerate();

            return redirect()->intended('index');
            // dd('berhasil auth!');
        } else {
            return back()->with('loginError','Gagal Login, Coba ulangi kembali!');
        }
    }

    public function LogoutUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('home');
    }
}
