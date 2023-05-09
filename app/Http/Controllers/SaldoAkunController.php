<?php

namespace App\Http\Controllers;

use App\Models\saldoUser;
use Illuminate\Http\Request;

class SaldoAkunController extends Controller
{
    public function indexDataSaldoAkun(){
        $saldo_user = saldoUser::all();
        return view('backend.users.saldo_users.view',[
            "saldoUser" => $saldo_user
        ]);
    }

    public function updateSaldo(Request $request){
        // $request->validate([
        //     'namajenis' =>'required'
        // ]);
        // $jenis_produk = ProductTypesModel::find($request->idjenis);
        // $jenis_produk->types_name = $request->namajenis;
        // $jenis_produk->save();
    }

    public function deleteSaldo(Request $request){
        $ambilIDSaldo = $request->ambilidsaldo;
        saldoUser::where('id',$ambilIDSaldo)->delete();

        return redirect('indexDataSaldoAkun');
    }
}
