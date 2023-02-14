<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Protype;
use App\Models\Manufacture;

use Illuminate\Http\Request;

class InsertController extends Controller
{
    function index(){
        $manufacture = Manufacture::all();
        $products = Product::orderBy('id', 'DESC')->get();
        $protype = Protype::all();
        //return view('index',['data'=>$products]);
        return view('/admin/product')->with(compact('products'));
    }
}
