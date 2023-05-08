<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaldoAkunController extends Controller
{
    public function indexDataSaldoAkun(){
        return view('backend.users.saldo_users.view');
    }
}
