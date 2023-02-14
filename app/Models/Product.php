<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Product extends Model
{
    use HasFactory;

    function manufacture(){
        return $this->belongsTo(Manufacture::class,'manu_id');
    }
    function protype(){
        return $this->belongsTo(Protype::class,'type_id');
    }
    /*
    function get10Product(){
        $products = DB::select('SELECT * FROM products ORDER BY id DESC');
        return view('index',['data'=>$products]);
    }
    */
}
