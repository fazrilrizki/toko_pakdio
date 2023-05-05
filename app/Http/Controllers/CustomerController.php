<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function formLoginCustomer(){
        return view('frontend.register.register');
    }
}
