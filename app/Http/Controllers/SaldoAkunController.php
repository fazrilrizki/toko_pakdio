<?php

namespace App\Http\Controllers;

use App\Models\ProductTypesModel;
use App\Models\saldoUser;
use Illuminate\Http\Request;

class SaldoAkunController extends Controller
{
    //BACKEND
    public function indexDataSaldoAkun(){
        if (session()->has('getUsername')) {
            $saldo_user = saldoUser::latest();
            $no = 1;
            return view('backend.users.saldo_users.view',[
                "saldoUser" => $saldo_user->filter(request(['search']))->paginate(10)->withQueryString(),
                "no" => $no
            ]);
        }
    return redirect('loginAdmin');
    }

    public function updateSaldo(Request $request){
        $request->validate([
            'saldo' =>'required'
        ]);
        $saldo_user = saldoUser::find($request->idsaldo);
        $saldo_user->saldo_elektronik = $request->saldo;
        $saldo_user->save();

        return redirect('indexDataSaldoAkun');
    }

    public function deleteSaldo(Request $request){
        $ambilIDSaldo = $request->ambilidsaldo;
        saldoUser::where('id',$ambilIDSaldo)->delete();

        return redirect('indexDataSaldoAkun');
    }

}
