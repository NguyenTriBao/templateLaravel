<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    function index(){
        return view('signup');
    }
    function signup(Request $request){
        $request->flash();
        $name = $request->fname;
        return view('output',['fname'=>$name]);
        echo $request->old('fname');
        echo $request->old('sname');
        echo $request->old('phone');
        echo $request->old('dob');
        echo $request->old('gender');
    }
}
