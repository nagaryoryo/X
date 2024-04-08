<?php

namespace App\Http\Controllers\hello;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HelloController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $sort = $request->sort;
        return view('hello.index',compact('user','sort'));
    }
    public function post(Request $request){
        $msg = $request->msg;
        $data = ['msg'=>'こんにちは！' . $msg . 'さん。'];
        return view('hello.index',$data);
    }
}