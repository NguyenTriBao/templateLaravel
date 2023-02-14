<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Protype;
use App\Models\Manufacture;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // function AuthLogin(){
    //     $admin_id = Session::get('admin_id');
    //     if($admin_id){
    //         return Redirect::to('dashboard');

    //     }else{
    //         return Redirect::to('welcome')->send();
    //     }
    // }
    // function show_dashboard(){
    //     $this->AuthLogin();
    //     return view('Admin.dashboard');
    // }
}
