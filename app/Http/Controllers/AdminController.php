<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function formLogin(){
        return view('backend.login.login');
    }

    public function actionLogin(Request $request){
        $checkingInput = $request->validate([
            'username' => 'required|max:11|min:3',
            'password' => 'required|min:7|max:11',
        ]);

        $ambilUsername = $checkingInput['username'];
        $ambilPassword = $checkingInput['password'];

        //QUERY SELECT WHERE MYSL
        $checkingAdmin =  DB::table('admin')->where('username', $ambilUsername)->where('password', $ambilPassword)->get();
        $ambilCount = $checkingAdmin->count();

        // $checkingKrs = DB::table('krs')->where('nim', $ambilNIM)->get();

        if ($ambilCount == 1) {
            dd('berhasil!');
        } else {
            return back()->with('loginError', 'Login failed!');
        }
    }
}
