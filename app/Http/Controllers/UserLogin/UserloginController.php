<?php

namespace App\Http\Controllers\UserLogin;

use App\Models\Cart;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserloginController extends Controller
{
    public function userLogin(){
        $brands=Brand::where('status',1)->get();
        $data = Cart::where('user_ip',request()->ip()) ->get();
        return view('Userlogin.login_registration',compact('brands','data'));
    }
}
