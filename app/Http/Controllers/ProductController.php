<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Product;
use App\Models\Protype;
use App\Models\Manufacture;
use App\Models\Comments;
use App\Models\User;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function product()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('/admin/product')->with(compact('products'));
    }
    public function protype()
    {
        $protype = Protype::all();
        return view('/admin/protype')->with(compact('protype'));
        
    }
    public function manufacture()
    {
        $manufacture = Manufacture::all();
        return view('/admin/manufacture')->with(compact('manufacture'));
    }
    public function comment()
    {
        $comments = Comments::all();
        return view('/admin/comments')->with(compact('comments'));
    }
    public function users()
    {
        $user = User::all();
        //return view('index',['data'=>$products]);
        return view('/admin/users')->with(compact('user'));
    }
    //Exec product
    public function addproduct(Request $request)
    {
        if($request->ismethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            $product = new Product;
            $product->name = $data['name'];
            //Upload image
            if($request->hasfile('image')){
                echo $img_tmp= $request->file('image');
                if($img_tmp->isVaLid()){
                    $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,9999).".".$extension;
                $img_path = 'images/'.$filename;
                
                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $product->image = $filename;
                }
            }
            $product->price = $data['price'];
            $product->manu_id = $data['manu_id'];
            $product->type_id = $data['type_id'];
            $product->quantity = $data['quantity'];
            $product->description = $data['description'];
            $product->save();
            return redirect('/admin/add-product')->with('flash_message_success','Product has been added successfully!');
        }
        return view('admin.add-product');
    }

    public function editproduct(Request $request,$id=null)
    {
        if($request->ismethod('post')){
            $data = $request->all();
            if($request->hasfile('image')){
                echo $img_tmp= $request->file('image');
                if($img_tmp->isVaLid()){
                    $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,9999).".".$extension;
                $img_path = 'images/'.$filename;
                
                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $product->image = $filename;
                }
            }else{
                $filename = $data['current_image'];
            }
            if(empty($data['description'])){
                $data['description'];
            }
            Product::where(['id'=>$id])->update(['name'=>$data['name'],'image'=>$filename,'price'=>$data['price'],
            'manu_id'=>$data['manu_id'],'type_id'=>$data['type_id'],'quantity'=>$data['quantity'],'description'=>$data['description']]);
            return redirect()->back()->with('flash_message_success','Product has been edit');
        }
        $productDetails = Product::where(['id'=>$id])->first();
        return view('admin.edit-product')->with(compact('productDetails'));
    }

    public function deleteProduct($id=null){
        Product::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Product has been delete');
    }
    //Exec protype
    public function addProtype(Request $request){
        if($request->ismethod('post')){
            $data = $request->all();
            $protype = new Protype;
            $protype->type_name = $data['type_name'];
            //Upload image
            if($request->hasfile('type_image')){
                echo $img_tmp= $request->file('type_image');
                if($img_tmp->isVaLid()){
                    $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,9999).".".$extension;
                $img_path = 'images/'.$filename;
                
                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $protype->type_image = $filename;
                }
            }
            $protype->save();
            return redirect('/admin/add-protype')->with('flash_message_success','Protype has been added successfully!');
        }
        return view('admin.add-protype');
    }
    public function editProtype(Request $request,$type_id=null)
    {
        if($request->ismethod('post')){
            $data = $request->all();
            if($request->hasfile('type_image')){
                echo $img_tmp= $request->file('type_image');
                if($img_tmp->isVaLid()){
                    $extension = $img_tmp->getClientOriginalExtension();
                $filename = rand(111,9999).".".$extension;
                $img_path = 'images/'.$filename;
                
                //image resize
                Image::make($img_tmp)->resize(500,500)->save($img_path);
                $protype->type_image = $filename;
                }
            }else{
                $filename = $data['current_image'];
            }
            Protype::where(['type_id'=>$type_id])->update(['type_name'=>$data['type_name'],'type_image'=>$filename]);
            return redirect()->back()->with('flash_message_success','Protype has been edit');
        }
        $protypeDetails = Protype::where(['type_id'=>$type_id])->first();
        return view('admin.edit-protype')->with(compact('protypeDetails'));
    }
    public function deleteProtype($type_id=null){
        Protype::where(['type_id'=>$type_id])->delete();
        return redirect()->back()->with('flash_message_success','Protype has been delete');
    }
    //Exec manufacture
    public function addManufacture(Request $request){
        if($request->ismethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            $manufacture = new Manufacture;
            $manufacture->manu_name = $data['manu_name'];
            $manufacture->save();
            return redirect('/admin/add-manufacture')->with('flash_message_success','Manufacture has been added successfully!');
        }
        return view('admin.add-manufacture');
    }
    public function editManufacture(Request $request,$manu_id=null)
    {
        if($request->ismethod('post')){
            $data = $request->all();
            Manufacture::where(['manu_id'=>$manu_id])->update(['manu_name'=>$data['manu_name']]);
            return redirect()->back()->with('flash_message_success','Manufacture has been edit');
        }
        $manufactureDetails = Manufacture::where(['manu_id'=>$manu_id])->first();
        return view('admin.edit-manufacture')->with(compact('manufactureDetails'));
    }
    public function deleteManufacture($manu_id=null){
        Manufacture::where(['manu_id'=>$manu_id])->delete();
        return redirect()->back()->with('flash_message_success','Manufacture has been delete');
    }
    //Exec comment
    public function deleteComment($com_id=null){
        Comments::where(['com_id'=>$com_id])->delete();
        return redirect()->back()->with('flash_message_success','Comment has been delete');
    }
    //Exec user
    public function deleteUser($id=null){
        User::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','User has been delete');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "Day la phuong thuc show " .$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "Day la phuong thuc edit " .$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "Day la phuong thuc update" .$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "Day la phuong thuc destroy " .$id;
    }
}
