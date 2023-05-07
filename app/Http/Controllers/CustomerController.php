<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('frontend.home.home');
    }

    public function homeCustomer()
    {
        return view('frontend.home.guest');
    }

    public function about()
    {
        return view('frontend.home.about');
    }

    public function actionRegisterCustomer(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'nama' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            $user = new User();
            $user->name = $request->nama;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            return redirect('registerCustomer')->with('registerSuccess', 'Registrasi Berhasil!');
        } catch (\Exception $e) {
            return redirect('registerCustomer')->with('registerError', 'Registrasi Gagal!, Coba Kembali!');
        }
    }

    public function authenticate(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $request->session()->regenerate();

            return redirect()->intended('index');
            // dd('berhasil auth!');
        } else {
            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ])->onlyInput('username');
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
