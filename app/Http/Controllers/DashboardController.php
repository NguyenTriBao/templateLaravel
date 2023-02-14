<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Protype;
use App\Models\Manufacture;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
   {
       if(Auth::user()->hasRole('user')){
        $manufacture = Manufacture::all();
        $products = Product::paginate(4);
        $productsList = Product::orderBy('id', 'DESC')->get();
        $protype = Protype::all();
        return view('index')->with(compact('products','productsList','protype'));
       }elseif(Auth::user()->hasRole('admin')){
        return view('admin/dashboard');
   }
   }
}
