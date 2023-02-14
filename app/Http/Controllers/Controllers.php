<?php

namespace App\Http\Controllers;
use App\Models\Comments;
use App\Models\Product;
use App\Models\Protype;
use App\Models\Manufacture;

use Illuminate\Http\Request;

use DB;

class Controllers extends Controller
{
    function index(){
        $manufacture = Manufacture::all();
        $products = Product::paginate(4);
        $productsList = Product::orderBy('id', 'DESC')->get();
        $protype = Protype::all();
        return view('index2')->with(compact('products','productsList','protype'));
    }
    function protype(){
        $manufacture = Manufacture::all();
        $product = Product::all();
        $protype = Protype::all();
        return view('shop')->with(compact('protype','manufacture','product'));
    }

    function category($type_id){
        $category = Protype::find($type_id);
        $manufacture = Manufacture::all();
        $protype = Protype::all();
        $product = Product::where('type_id',$type_id)->get();
        return view('category')->with(compact('product','protype','manufacture','category'));
    }
    function manufacture($manu_id){
        $category = Manufacture::find($manu_id);
        $manufacture = Manufacture::all();
        $protype = Protype::all();
        $product = Product::where('manu_id',$manu_id)->get();
        return view('manufacture')->with(compact('product','protype','manufacture','category'));
    }
    function search(Request $request){
        $manufacture = Manufacture::all();
        $protype = Protype::all();
        $keywords = $request->keywords_submit;
        $product = Product::where('name','like','%' .$keywords. '%')->paginate(3);
        $product->appends($request->all());
        return view('search')->with(compact('protype','manufacture','product'));
    }
    // function shop(){
    //     $manufacture = Manufacture::all();
    //     $products = Product::all();
    //     $protype = Protype::all();
    //     //return view('index',['data'=>$products]);
    //     return view('shop',
    //     [
    //         'product'=>$products,
    //         'manufacture'=>$manufacture
    //     ]);
    // }
    // function shop(){
    //     $manufacture = Manufacture::all();
    //     $products = Product::paginate(4);
    //     $protype = Protype::all();
    //     //return view('index',['data'=>$products]);
    //     return view('shop')->with(compact('manufacture'));
    // }
    function get10Product(){
        $productsList = Product::orderBy('id', 'DESC')->get();
        return view('index')->with(compact('productsList'));
    }
    function addCart($id){

        //session()->flush('cart');
        $product = Product::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }
        else{
            $cart[$id] = [
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'manu_id' => $product->manu_id,
                'type_id' => $product->type_id,
                'quantity' => 1,
                'description' => $product->description
            ];
        }
        session()->put('cart', $cart);
        //echo "<pre>";
        //print_r(session()->get('cart'));
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
    function showCart(){
        //echo "<pre>";
        //print_r(session()->get('cart'));
        $carts = session()->get('cart');
        return view('cart',compact('carts'));
    }

    public function insertform(){
        return view('insert');
    }
    public function product($id){
        $data = Product::find($id);
        $comments = Comments::where('com_product',$id)->get();
        $type_id = $data->type_id;
        $related_products = Product::where('type_id',$type_id)->limit(4)->get();
        return view('detail', compact(['data','comments','related_products']));
    }
    public function product2($id){
        $data = Product::find($id);
        $comments = Comments::where('com_product',$id)->get();
        $type_id = $data->type_id;
        $related_products = Product::where('type_id',$type_id)->limit(4)->get();
        return view('detail2', compact(['data','comments','related_products']));
    }
    public function comments(Request $request, $id){
        $comments = new Comments;
        $comments->com_name = $request->name;
        $comments->com_email = $request->email;
        $comments->com_content = $request->message;
        $comments->com_product = $id;
        $comments->save();
        return back();
    }
}
